<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

/**
 * Restores the TOPES catalog from the JSON snapshot in database/seeders/data.
 *
 * The snapshot was recovered on 2026-08-31 from the Railway MySQL service
 * (project "powerful-creativity") after the DigitalOcean account was deleted.
 * Product data reflects production as of 2025-08-13.
 *
 * Product images live in database/seeders/images and are copied into
 * storage/app/public so they survive in version control — the Railway volume
 * was empty, so git is the only remaining source for them.
 */
class RecoveredCatalogSeeder extends Seeder
{
    /** Tables restored, in foreign-key-safe order. */
    private const TABLES = [
        'product_categories',
        'products',
        'product_questions',
    ];

    public function run(): void
    {
        foreach (self::TABLES as $table) {
            $path = database_path("seeders/data/{$table}.json");

            if (! File::exists($path)) {
                $this->command->warn("  {$table}: no snapshot at {$path}, skipped");
                continue;
            }

            $rows = json_decode(File::get($path), true);

            foreach ($rows as $row) {
                DB::table($table)->updateOrInsert(['id' => $row['id']], $row);
            }

            $this->command->info(sprintf('  %-20s %3d rows restored', $table, count($rows)));
        }

        $this->publishImages();
    }

    /**
     * Copy the versioned product images onto the public disk. Existing files are
     * left alone so a redeploy never clobbers anything uploaded through Filament.
     */
    private function publishImages(): void
    {
        $source = database_path('seeders/images');
        $target = storage_path('app/public');

        if (! File::isDirectory($source)) {
            $this->command->warn('  images: no source directory, skipped');

            return;
        }

        File::ensureDirectoryExists($target);

        $copied = $skipped = 0;

        foreach (File::files($source) as $file) {
            $destination = $target.DIRECTORY_SEPARATOR.$file->getFilename();

            if (File::exists($destination)) {
                $skipped++;

                continue;
            }

            File::copy($file->getPathname(), $destination);
            $copied++;
        }

        $this->command->info(sprintf('  %-20s %3d copied, %d already present', 'images', $copied, $skipped));

        $missing = DB::table('products')
            ->whereNotNull('picture')
            ->where('picture', '<>', '')
            ->pluck('picture')
            ->reject(fn ($picture) => File::exists($target.DIRECTORY_SEPARATOR.$picture))
            ->count();

        if ($missing > 0) {
            $this->command->warn("  {$missing} products still have no image file (lost with the DigitalOcean server)");
        }
    }
}
