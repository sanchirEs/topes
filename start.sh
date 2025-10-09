#!/bin/bash

# Link storage
echo "Linking storage..."
php artisan storage:link

# Optimize application
echo "Optimizing application..."
php artisan optimize
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Try to run migrations (ignore errors for now)
echo "Attempting database migrations..."
php artisan migrate --force || echo "Database not available, skipping migrations"

# Start the server
echo "Starting Laravel server..."
php artisan serve --host=0.0.0.0 --port=$PORT
