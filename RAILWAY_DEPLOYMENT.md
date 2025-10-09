# Railway Deployment Guide for TOPES

## Quick Fix for Current Issue

Your `DB_HOST` environment variable needs to reference the MySQL service correctly.

### In Railway Dashboard:

1. **Go to your Web Service** → Variables tab
2. **Update `DB_HOST`** to one of these (choose based on your MySQL service name):

   ```
   DB_HOST=${{MySQL.RAILWAY_PRIVATE_DOMAIN}}
   ```
   
   OR if your MySQL service has a different name (e.g., "database"):
   
   ```
   DB_HOST=${{database.RAILWAY_PRIVATE_DOMAIN}}
   ```

3. **Better: Use all MySQL references** (recommended):
   
   ```
   DB_HOST=${{MySQL.RAILWAY_PRIVATE_DOMAIN}}
   DB_PORT=${{MySQL.MYSQLPORT}}
   DB_DATABASE=${{MySQL.MYSQL_DATABASE}}
   DB_USERNAME=${{MySQL.MYSQLUSER}}
   DB_PASSWORD=${{MySQL.MYSQL_ROOT_PASSWORD}}
   ```

## Complete Railway Setup

### 1. MySQL Service Environment Variables

Your MySQL service should have these variables:

```env
MYSQL_DATABASE=railway
MYSQL_ROOT_PASSWORD=PLrbeOwkbappwwJXWVCkNjaQWMtkdXsL
MYSQLUSER=root
```

### 2. Web Service Environment Variables

Update your web service with these variables:

```env
# App Configuration
APP_NAME="TOPES"
APP_ENV=production
APP_DEBUG=false
APP_KEY=base64:8jR+F+DnqygLaGG3EeCslVMO4v/HH6iJh6+SJDqBuT0=
APP_URL=${{RAILWAY_PUBLIC_DOMAIN}}

# Database - Use references to MySQL service
DB_CONNECTION=mysql
DB_HOST=${{MySQL.RAILWAY_PRIVATE_DOMAIN}}
DB_PORT=${{MySQL.MYSQLPORT}}
DB_DATABASE=${{MySQL.MYSQL_DATABASE}}
DB_USERNAME=${{MySQL.MYSQLUSER}}
DB_PASSWORD=${{MySQL.MYSQL_ROOT_PASSWORD}}

# Cache & Session
CACHE_STORE=database
SESSION_DRIVER=database
SESSION_LIFETIME=52560000
QUEUE_CONNECTION=database

# Filesystem
FILESYSTEM_DISK=public

# Logging
LOG_LEVEL=error

# Broadcasting
BROADCAST_CONNECTION=log

# Telegram
TELEGRAM_BOT_TOKEN=7884405090:AAFkxKLuNTgCQrs5XxtcCXjLRQEFtrrcu-8
TELEGRAM_CHAT_ID=6973538812
```

### 3. How to Find Your MySQL Service Name

1. Go to Railway Dashboard
2. Look at your MySQL service card - the name is at the top
3. Common names: `MySQL`, `database`, `mysql`, etc.
4. Use that exact name (case-sensitive) in the reference variables

### 4. Testing Database Connection

After deployment, check the logs. You should see:

```
================================
Database Configuration:
DB_CONNECTION: mysql
DB_HOST: mysql.railway.internal (or similar)
DB_PORT: 3306
DB_DATABASE: railway
DB_USERNAME: root
================================
Waiting for MySQL to be ready...
✓ MySQL is ready!
```

If you still see connection errors, the output will show you the actual DB_HOST value being used.

## Troubleshooting

### Still Getting "Connection Refused"?

1. **Check MySQL Service is Running**: In Railway dashboard, verify MySQL service is deployed and healthy
2. **Verify Service Name**: Make sure you're using the correct service name in references
3. **Try TCP Proxy** (temporary test):
   ```
   DB_HOST=${{MySQL.RAILWAY_TCP_PROXY_DOMAIN}}
   DB_PORT=${{MySQL.RAILWAY_TCP_PROXY_PORT}}
   ```
   This uses public connection - if this works, it's a private networking issue

### MySQL Takes Too Long to Start?

The new `start.sh` waits up to 60 seconds for MySQL. If you need longer:

Edit `start.sh` line 18:
```bash
MAX_RETRIES=30  # Change to 60 for 120 seconds, etc.
```

### View Connection Details

The updated `start.sh` now prints your database configuration at startup. Check the deployment logs to see what values are actually being used.

## Next Steps After Fixing

Once the database connection works:

1. ✅ Migrations will run automatically
2. ✅ Application will start on port 8080
3. ✅ Visit your Railway public URL

## Volume Configuration

Make sure you have a volume mounted at `/var/lib/containers/railwayapp/bind-mounts/.../storage` 

In Railway:
- Go to your Web Service
- Click "Storage" or "Volumes"
- Add volume with mount path: `/app/storage`

