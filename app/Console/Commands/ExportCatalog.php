<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

/**
 * Writes the live catalog back into version control.
 *
 * The inverse of RecoveredCatalogSeeder. Anything added through the admin panel
 * lives only in the database and on the storage disk until this runs — which is
 * exactly how the original catalog was lost when the host went away. Run it
 * after editing content, then commit.
 */
class ExportCatalog extends Command
{
    protected $signature = 'catalog:export';

    protected $description = 'Export the catalog and uploaded images into database/seeders for committing';

    /** Kept in foreign-key-safe order so the seeder can replay them directly. */
    private const TABLES = [
        'product_categories',
        'products',
        'product_questions',
    ];

    public function handle(): int
    {
        $dataDir = database_path('seeders/data');
        $imageDir = database_path('seeders/images');

        File::ensureDirectoryExists($dataDir);
        File::ensureDirectoryExists($imageDir);

        foreach (self::TABLES as $table) {
            $rows = DB::table($table)->orderBy('id')->get()
                ->map(fn ($row) => (array) $row)
                ->all();

            File::put(
                "{$dataDir}/{$table}.json",
                json_encode($rows, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)
            );

            $this->line(sprintf('  %-20s %4d rows', $table, count($rows)));
        }

        $this->exportImages($imageDir);

        $this->newLine();
        $this->info('Exported. Commit database/seeders/ to make this recoverable from git.');

        return self::SUCCESS;
    }

    /**
     * Copy images referenced by products out of the storage disk and into the
     * versioned folder. Only files actually in use are exported, so deleted
     * products do not leave their images behind forever.
     */
    private function exportImages(string $imageDir): void
    {
        $source = storage_path('app/public');
        $copied = $present = $missing = 0;

        $pictures = DB::table('products')
            ->whereNotNull('picture')
            ->where('picture', '<>', '')
            ->pluck('picture')
            ->unique();

        foreach ($pictures as $picture) {
            $from = $source.DIRECTORY_SEPARATOR.$picture;
            $to = $imageDir.DIRECTORY_SEPARATOR.$picture;

            if (! File::exists($from)) {
                $missing++;

                continue;
            }

            if (File::exists($to) && File::size($from) === File::size($to)) {
                $present++;

                continue;
            }

            File::copy($from, $to);
            $copied++;
        }

        $this->line(sprintf('  %-20s %4d new, %d unchanged', 'images', $copied, $present));

        if ($missing > 0) {
            $this->warn("  {$missing} products reference an image that is not on the storage disk");
        }
    }
}
