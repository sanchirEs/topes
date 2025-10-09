#!/bin/bash

# Run migrations
echo "Running database migrations..."
php artisan migrate --force

# Link storage
echo "Linking storage..."
php artisan storage:link

# Optimize application
echo "Optimizing application..."
php artisan optimize
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Start the server
echo "Starting Laravel server..."
php artisan serve --host=0.0.0.0 --port=$PORT
