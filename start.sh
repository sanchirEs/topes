#!/bin/bash

# Set PORT default if not set
PORT=${PORT:-8080}

# Debug: Print database connection info
echo "================================"
echo "Database Configuration:"
echo "DB_CONNECTION: $DB_CONNECTION"
echo "DB_HOST: $DB_HOST"
echo "DB_PORT: $DB_PORT"
echo "DB_DATABASE: $DB_DATABASE"
echo "DB_USERNAME: $DB_USERNAME"
echo "================================"

# Wait for MySQL to be ready (max 60 seconds)
echo "Waiting for MySQL to be ready..."
MAX_RETRIES=30
RETRY_COUNT=0

while [ $RETRY_COUNT -lt $MAX_RETRIES ]; do
  if php artisan db:show 2>/dev/null; then
    echo "✓ MySQL is ready!"
    break
  else
    RETRY_COUNT=$((RETRY_COUNT + 1))
    echo "MySQL not ready yet (attempt $RETRY_COUNT/$MAX_RETRIES)..."
    sleep 2
  fi
done

if [ $RETRY_COUNT -eq $MAX_RETRIES ]; then
  echo "⚠ Warning: Could not connect to MySQL after $MAX_RETRIES attempts"
  echo "Continuing anyway... migrations may fail"
fi

# Link storage
echo "Linking storage..."
php artisan storage:link

# Optimize application
echo "Optimizing application..."
php artisan optimize
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Run migrations
echo "Attempting database migrations..."
if php artisan migrate --force; then
  echo "✓ Migrations completed successfully"
else
  echo "⚠ Migration failed - check database connection"
  # Print last few lines of log for debugging
  echo "Checking Laravel logs..."
  tail -n 20 storage/logs/laravel.log 2>/dev/null || echo "No logs available yet"
fi

# Start the server
echo "================================"
echo "Starting Laravel server on 0.0.0.0:$PORT"
echo "================================"
php artisan serve --host=0.0.0.0 --port=$PORT
