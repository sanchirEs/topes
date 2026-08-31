#!/usr/bin/env bash
#
# Railway start command for the web service.
#
# The volume is mounted at /app/storage, so every writable Laravel directory
# lives on persistent disk: the SQLite database, uploaded images, sessions and
# caches all survive redeploys. A fresh volume starts empty, which is why the
# directory tree is rebuilt on every boot.
set -uo pipefail

PORT="${PORT:-8080}"

echo "==> Preparing storage"
for dir in app/public framework/cache/data framework/sessions framework/views logs; do
    mkdir -p "storage/${dir}"
done

# Images uploaded while the volume was mounted at storage/app/public sit at the
# volume root after the remount. Move them back under the public disk. -n keeps
# any file that already made it across.
find storage -maxdepth 1 -type f \
    \( -iname '*.jpg' -o -iname '*.jpeg' -o -iname '*.png' \
       -o -iname '*.webp' -o -iname '*.gif' -o -iname '*.svg' \) \
    -exec mv -n {} storage/app/public/ \; 2>/dev/null || true

if [ "${DB_CONNECTION:-}" = "sqlite" ]; then
    DB_PATH="${DB_DATABASE:-/app/storage/database.sqlite}"
    if [ ! -f "${DB_PATH}" ]; then
        echo "==> Creating ${DB_PATH}"
        install -m 644 /dev/null "${DB_PATH}"
    fi
fi

echo "==> Linking public storage"
php artisan storage:link --force || echo "storage:link skipped"

echo "==> Running migrations"
php artisan migrate --force || echo "migrate failed — continuing so the site still boots"

# Idempotent: rows are upserted by id and existing image files are left alone.
echo "==> Seeding recovered catalog"
php artisan db:seed --class=RecoveredCatalogSeeder --force || echo "seed failed — product images may be missing"

echo "==> Serving on 0.0.0.0:${PORT}"
exec php artisan serve --host=0.0.0.0 --port="${PORT}"
