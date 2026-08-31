<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

/**
 * One-off migration off the Railway MySQL service and onto a SQLite file on
 * the web service's volume.
 *
 * The whole database is 160KB of real content, so MySQL was costing more than
 * the app it served. This runs inside the container while MySQL is still
 * reachable, which keeps the admin password hash on Railway instead of routing
 * it through a laptop.
 *
 * Safe to re-run: the target is rebuilt from migrations and refilled each time.
 */
class MigrateMysqlToSqlite extends Command
{
    protected $signature = 'db:mysql-to-sqlite
                            {--path= : Target SQLite file (default: /app/storage/database.sqlite)}
                            {--fresh : Delete an existing target file before copying}';

    protected $description = 'Copy the live MySQL database into a SQLite file on the volume';

    /**
     * sessions is 99.6% of the database and is pure crawler residue, so it is
     * dropped rather than carried over. migrations is rebuilt by migrate.
     */
    private const SKIP = ['sessions', 'migrations'];

    public function handle(): int
    {
        if (config('database.default') === 'sqlite') {
            $this->error('DB_CONNECTION is already sqlite — point it back at mysql to run this.');

            return self::FAILURE;
        }

        $path = $this->option('path') ?: '/app/storage/database.sqlite';

        if ($this->option('fresh') && file_exists($path)) {
            unlink($path);
            $this->line("Removed existing {$path}");
        }

        if (! is_dir(dirname($path))) {
            mkdir(dirname($path), 0755, true);
        }

        if (! file_exists($path)) {
            touch($path);
        }

        $this->line("Target: {$path}");

        // Foreign keys stay off so tables can be copied in arbitrary order.
        Config::set('database.connections.sqlite_target', [
            'driver' => 'sqlite',
            'database' => $path,
            'prefix' => '',
            'foreign_key_constraints' => false,
        ]);

        DB::purge('sqlite_target');
        $target = DB::connection('sqlite_target');

        $this->line('Building schema...');
        $exit = Artisan::call('migrate', [
            '--database' => 'sqlite_target',
            '--force' => true,
        ], $this->getOutput());

        if ($exit !== self::SUCCESS) {
            $this->error('Migrations failed against the SQLite target.');

            return self::FAILURE;
        }

        $source = DB::connection(config('database.default'));
        $tables = array_map(
            fn ($row) => array_values((array) $row)[0],
            $source->select('SHOW TABLES')
        );

        $copied = [];

        foreach ($tables as $table) {
            if (in_array($table, self::SKIP, true)) {
                $this->line(sprintf('  %-24s skipped', $table));

                continue;
            }

            if (! $target->getSchemaBuilder()->hasTable($table)) {
                $this->warn(sprintf('  %-24s no matching table in SQLite — skipped', $table));

                continue;
            }

            $target->table($table)->delete();
            $total = 0;

            $source->table($table)->orderBy(
                $source->getSchemaBuilder()->hasColumn($table, 'id') ? 'id' : $this->firstColumn($source, $table)
            )->chunk(500, function ($rows) use ($target, $table, &$total) {
                $batch = array_map(fn ($row) => (array) $row, $rows->all());
                $target->table($table)->insert($batch);
                $total += count($batch);
            });

            $copied[$table] = $total;
            $this->line(sprintf('  %-24s %d rows', $table, $total));
        }

        $this->newLine();
        $this->info('Copied '.array_sum($copied).' rows across '.count($copied).' tables.');
        $this->line('Size: '.number_format(filesize($path) / 1024, 1).' KB');
        $this->newLine();
        $this->line('Next: set DB_CONNECTION=sqlite and DB_DATABASE='.$path);

        return self::SUCCESS;
    }

    private function firstColumn($connection, string $table): string
    {
        return $connection->getSchemaBuilder()->getColumnListing($table)[0];
    }
}
