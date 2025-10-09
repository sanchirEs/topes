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

# Wait for MySQL to be ready (max 4 minutes)
echo "Waiting for MySQL to be ready..."
echo "(MySQL takes 1-3 minutes to fully initialize on Railway...)"
echo ""
MAX_RETRIES=60
RETRY_COUNT=0
CONNECTED=false

# Create a PHP MySQL connection test that actually queries the database
cat > /tmp/mysql_test.php << 'PHPTEST'
<?php
$host = getenv('DB_HOST') ?: '127.0.0.1';
$port = getenv('DB_PORT') ?: '3306';
$db = getenv('DB_DATABASE') ?: 'railway';
$user = getenv('DB_USERNAME') ?: 'root';
$pass = getenv('DB_PASSWORD') ?: '';

try {
    $dsn = "mysql:host=$host;port=$port;dbname=$db;charset=utf8mb4";
    $options = [
        PDO::ATTR_TIMEOUT => 5,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ];
    $pdo = new PDO($dsn, $user, $pass, $options);
    
    // Actually query the database to ensure it's ready
    $stmt = $pdo->query('SELECT 1');
    $result = $stmt->fetch();
    
    if ($result[0] == 1) {
        echo "SUCCESS";
        exit(0);
    } else {
        echo "FAILED: Query returned unexpected result";
        exit(1);
    }
} catch (Exception $e) {
    echo "FAILED: " . $e->getMessage();
    exit(1);
}
PHPTEST

while [ $RETRY_COUNT -lt $MAX_RETRIES ]; do
  RETRY_COUNT=$((RETRY_COUNT + 1))
  echo -n "[$RETRY_COUNT/$MAX_RETRIES] Testing MySQL connection and query... "
  
  # Try the PHP connection test
  RESULT=$(php /tmp/mysql_test.php 2>&1)
  
  if echo "$RESULT" | grep -q "SUCCESS"; then
    echo "✓ Connected and verified!"
    CONNECTED=true
    break
  else
    # Show the actual error for first few attempts
    if [ $RETRY_COUNT -le 3 ]; then
      echo "Failed: $RESULT"
    else
      echo "Not ready yet..."
    fi
    
    # Progressive backoff: first 10 tries = 3s, then 5s
    if [ $RETRY_COUNT -lt 10 ]; then
      sleep 3
    else
      sleep 5
    fi
  fi
done

# Clean up test file
rm -f /tmp/mysql_test.php

if [ "$CONNECTED" = false ]; then
  echo ""
  echo "⚠⚠⚠ WARNING ⚠⚠⚠"
  echo "Could not connect to MySQL after $MAX_RETRIES attempts (4 minutes)"
  echo ""
  echo "Common causes on Railway:"
  echo "1. MySQL is STILL starting up (this can take 3-5 minutes on first deploy)"
  echo "2. IPv6/IPv4 networking issue"
  echo "3. MySQL service crashed or failed to start"
  echo ""
  echo "RECOMMENDED ACTION:"
  echo "- Check MySQL service logs in Railway dashboard"
  echo "- Wait for MySQL to show 'Active' status"
  echo "- Then redeploy this web service"
  echo ""
  echo "Continuing anyway... migrations will fail but app will start"
  echo ""
else
  echo ""
  echo "MySQL is ready! Waiting 5 seconds for stability..."
  sleep 5
  echo "✓ Ready to proceed"
  echo ""
fi

# Link storage
echo "Linking storage..."
php artisan storage:link
echo ""

# Clear non-database caches first (these don't need DB connection)
echo "Clearing file-based caches..."
php artisan config:clear 2>/dev/null || echo "Config cache already clear"
php artisan route:clear 2>/dev/null || echo "Route cache already clear"
php artisan view:clear 2>/dev/null || echo "View cache already clear"
echo "✓ File caches cleared (skipping database cache for now)"
echo ""

# Additional stability wait (Laravel connection pool needs time)
echo "Waiting additional 20 seconds for MySQL connection pool stability..."
sleep 20
echo "✓ Ready for Laravel database operations"
echo ""

# Debug: Test Laravel's actual database config
echo "Debugging Laravel database configuration..."
php -r "
require 'vendor/autoload.php';
\$app = require_once 'bootstrap/app.php';
\$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();
echo 'Laravel DB Host: ' . config('database.connections.mysql.host') . PHP_EOL;
echo 'Laravel DB Port: ' . config('database.connections.mysql.port') . PHP_EOL;
echo 'Laravel DB Name: ' . config('database.connections.mysql.database') . PHP_EOL;
echo 'Laravel DB User: ' . config('database.connections.mysql.username') . PHP_EOL;
" 2>&1 || echo "Could not load Laravel config"
echo ""

# Test with Laravel's actual database connection (not just PHP PDO)
echo "Testing Laravel database connection..."
LARAVEL_TEST_ATTEMPTS=0
LARAVEL_TEST_MAX=10
LARAVEL_CONNECTED=false

while [ $LARAVEL_TEST_ATTEMPTS -lt $LARAVEL_TEST_MAX ]; do
  LARAVEL_TEST_ATTEMPTS=$((LARAVEL_TEST_ATTEMPTS + 1))
  echo -n "  Attempt $LARAVEL_TEST_ATTEMPTS/$LARAVEL_TEST_MAX: "
  
  if php artisan db:show 2>/dev/null | grep -q "mysql"; then
    echo "✓ Laravel can connect!"
    LARAVEL_CONNECTED=true
    break
  else
    echo "Failed, waiting 3 seconds..."
    sleep 3
  fi
done

if [ "$LARAVEL_CONNECTED" = false ]; then
  echo "⚠ Laravel cannot connect to MySQL even though PHP PDO can!"
  echo "This might be a Laravel configuration issue."
  echo "Continuing anyway..."
else
  # NOW clear database cache since Laravel can connect
  echo "Clearing database cache (now that Laravel can connect)..."
  php artisan cache:clear 2>/dev/null || echo "Cache clear skipped or already clear"
  echo ""
fi
echo ""

# NOW optimize application AFTER MySQL is verified ready with Laravel
echo "Optimizing application..."
php artisan optimize
php artisan config:cache
php artisan route:cache
php artisan view:cache
echo ""

# Run migrations with retry logic
echo "Attempting database migrations..."
MIGRATION_ATTEMPTS=0
MIGRATION_MAX=5
MIGRATION_SUCCESS=false

while [ $MIGRATION_ATTEMPTS -lt $MIGRATION_MAX ]; do
  MIGRATION_ATTEMPTS=$((MIGRATION_ATTEMPTS + 1))
  
  if [ $MIGRATION_ATTEMPTS -gt 1 ]; then
    echo ""
    echo "Retry $MIGRATION_ATTEMPTS/$MIGRATION_MAX: Attempting migrations again after 5 second wait..."
    sleep 5
  fi
  
  if php artisan migrate --force 2>&1; then
    MIGRATION_SUCCESS=true
    break
  else
    echo "Migration attempt $MIGRATION_ATTEMPTS failed"
  fi
done

echo ""
if [ "$MIGRATION_SUCCESS" = true ]; then
  echo "✓✓✓ Migrations completed successfully! ✓✓✓"
  echo ""
else
  echo "⚠⚠⚠ Migration failed after $MIGRATION_MAX attempts ⚠⚠⚠"
  echo ""
  echo "This is unusual since MySQL connection was verified."
  echo ""
  echo "Possible causes:"
  echo "1. Database user lacks permission to create tables"
  echo "2. Database already has conflicting data"
  echo "3. Migration files have syntax errors"
  echo "4. MySQL connection is unstable"
  echo ""
  echo "Checking Laravel logs..."
  tail -n 30 storage/logs/laravel.log 2>/dev/null || echo "No logs available yet"
  echo ""
  echo "App will start anyway, but database may not be initialized!"
  echo ""
fi

# Start the server
echo "================================"
echo "Starting Laravel server on 0.0.0.0:$PORT"
echo "================================"
php artisan serve --host=0.0.0.0 --port=$PORT
