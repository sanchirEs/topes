#!/bin/bash

# Set PORT default if not set
PORT=${PORT:-8080}

echo "================================"
echo "TOPES Deployment Starting..."
echo "================================"

# Debug: Print database connection info
echo ""
echo "Database Configuration:"
echo "----------------------"
echo "DB_CONNECTION: ${DB_CONNECTION:-NOT SET}"
echo "DB_HOST: ${DB_HOST:-NOT SET}"
echo "DB_PORT: ${DB_PORT:-NOT SET}"
echo "DB_DATABASE: ${DB_DATABASE:-NOT SET}"
echo "DB_USERNAME: ${DB_USERNAME:-NOT SET}"
echo "DB_PASSWORD: ${DB_PASSWORD:0:5}... (hidden)"
echo ""

# Test if we can resolve the DB_HOST
if [ ! -z "$DB_HOST" ]; then
  echo "Testing DNS resolution for DB_HOST..."
  if getent hosts "$DB_HOST" > /dev/null 2>&1; then
    echo "✓ DNS resolution successful for $DB_HOST"
    getent hosts "$DB_HOST"
  else
    echo "✗ Cannot resolve hostname: $DB_HOST"
    echo "This might be why connection is failing!"
  fi
  echo ""
fi

# Test if MySQL port is reachable
if [ ! -z "$DB_HOST" ] && [ ! -z "$DB_PORT" ]; then
  echo "Testing TCP connection to $DB_HOST:$DB_PORT..."
  if timeout 5 bash -c "cat < /dev/null > /dev/tcp/$DB_HOST/$DB_PORT" 2>/dev/null; then
    echo "✓ Port $DB_PORT is reachable on $DB_HOST"
  else
    echo "✗ Cannot connect to $DB_HOST:$DB_PORT"
    echo "MySQL service might not be running or network issue exists"
  fi
  echo ""
fi

echo "================================"

# Wait for MySQL to be ready (max 2 minutes)
echo "Waiting for MySQL to be ready..."
echo "(This may take a while if MySQL is still starting up...)"
MAX_RETRIES=40
RETRY_COUNT=0

while [ $RETRY_COUNT -lt $MAX_RETRIES ]; do
  echo -n "Attempt $((RETRY_COUNT + 1))/$MAX_RETRIES: "
  if php artisan db:show 2>/dev/null; then
    echo "✓ MySQL is ready!"
    break
  else
    echo "Not ready yet, waiting 3 seconds..."
    RETRY_COUNT=$((RETRY_COUNT + 1))
    sleep 3
  fi
done

if [ $RETRY_COUNT -eq $MAX_RETRIES ]; then
  echo ""
  echo "⚠⚠⚠ WARNING ⚠⚠⚠"
  echo "Could not connect to MySQL after $MAX_RETRIES attempts"
  echo ""
  echo "Possible causes:"
  echo "1. DB_HOST is incorrect (check value above)"
  echo "2. MySQL service is not running"
  echo "3. MySQL service takes longer to start (normal on first deploy)"
  echo "4. Network connectivity issue between services"
  echo ""
  echo "Continuing anyway... migrations will likely fail"
  echo ""
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
