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

# Clear any old cached config (important!)
echo "Clearing old configuration cache..."
php artisan config:clear 2>/dev/null || echo "No cache to clear"
echo ""

# NOW optimize application AFTER MySQL is verified ready
echo "Optimizing application..."
php artisan optimize
php artisan config:cache
php artisan route:cache
php artisan view:cache
echo ""

# Run migrations
echo "Attempting database migrations..."
if php artisan migrate --force; then
  echo ""
  echo "✓✓✓ Migrations completed successfully! ✓✓✓"
  echo ""
else
  echo ""
  echo "⚠⚠⚠ Migration failed ⚠⚠⚠"
  echo "This is unusual since MySQL connection was verified."
  echo ""
  echo "Possible causes:"
  echo "1. Database user lacks permission to create tables"
  echo "2. Database already has conflicting data"
  echo "3. Migration files have syntax errors"
  echo ""
  echo "Checking Laravel logs..."
  tail -n 30 storage/logs/laravel.log 2>/dev/null || echo "No logs available yet"
  echo ""
fi

# Start the server
echo "================================"
echo "Starting Laravel server on 0.0.0.0:$PORT"
echo "================================"
php artisan serve --host=0.0.0.0 --port=$PORT
