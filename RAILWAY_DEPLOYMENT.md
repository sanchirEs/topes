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

### Getting "Connection Refused" Error?

This is the most common issue. Here's how to diagnose and fix it:

#### Step 1: Check What DB_HOST Actually Is

Look at your deployment logs for this section:
```
Database Configuration:
----------------------
DB_CONNECTION: mysql
DB_HOST: ??????  <-- What does this say?
DB_PORT: 3306
```

**Common wrong values:**
- `web.railway.internal` ❌ (points to web service itself)
- `localhost` ❌ (doesn't work in Railway)
- Empty/NOT SET ❌

**Should be something like:**
- `mysql.railway.internal` ✅
- `abc123.railway.internal` ✅

#### Step 2: Fix DB_HOST Variable

The fix depends on what DB_HOST shows:

##### If DB_HOST shows "web.railway.internal" or is wrong:

**In Railway Dashboard → Web Service → Variables:**

**Option A: Use Variable References** (Best)
```env
DB_HOST=${{MySQL.RAILWAY_PRIVATE_DOMAIN}}
```
Replace `MySQL` with your actual MySQL service name (check service card title)

**Option B: Use Direct Private Domain**
1. Go to MySQL service
2. Find "Networking" section
3. Copy the "Private Domain" (usually ends in `.railway.internal`)
4. Set `DB_HOST` to that value

##### If DB_HOST is correct but still fails:

**Check MySQL Service Status:**
1. Go to Railway Dashboard → MySQL service
2. Click "Deployments" tab
3. Verify it says "Active" (not "Building" or "Failed")
4. Check MySQL logs for any errors

**Try Public Connection (temporary test):**
```env
DB_HOST=${{MySQL.RAILWAY_TCP_PROXY_DOMAIN}}
DB_PORT=${{MySQL.RAILWAY_TCP_PROXY_PORT}}
```
If this works, you have a private networking issue.

#### Step 3: Verify MySQL is Ready

Railway might start your web service before MySQL is fully ready.

The updated `start.sh` now waits up to 2 minutes. Check logs for:
```
Testing DNS resolution for DB_HOST...
✓ DNS resolution successful
Testing TCP connection to mysql.railway.internal:3306...
✓ Port 3306 is reachable
```

If you see ✗ instead of ✓, that tells you exactly what's wrong.

#### Step 4: Check Service Dependencies

In Railway, you may need to explicitly set dependencies:

1. Go to Web Service → Settings
2. Look for "Service Dependencies" or similar
3. Add MySQL service as a dependency
4. Redeploy

### Common Railway-Specific Issues

#### Issue: Services Can't See Each Other

**Symptom:** DNS resolution fails
**Fix:** Make sure both services are in the same project and environment

#### Issue: MySQL Takes Too Long to Start

**Symptom:** All 40 connection attempts fail, but app works after restart
**Fix:** This is normal on first deploy. Just redeploy the web service after MySQL is up.

#### Issue: Variable References Not Working

**Symptom:** `${{MySQL.RAILWAY_PRIVATE_DOMAIN}}` appears literally in logs
**Fix:** 
1. Check MySQL service name is exactly correct (case-sensitive)
2. Make sure you're using the Railway format, not shell format
3. Railway variables are: `${{ServiceName.VARIABLE_NAME}}`

### Testing Steps

1. **Deploy MySQL first**, wait for it to be "Active"
2. **Then deploy/redeploy web service**
3. **Check logs immediately** for the diagnostics at the start
4. **If DNS test fails**: Wrong DB_HOST
5. **If TCP test fails**: MySQL not ready or network issue
6. **If both pass but migration fails**: Check credentials (DB_USERNAME, DB_PASSWORD)

### View Connection Details

The updated `start.sh` now prints comprehensive diagnostics:
- Database configuration values
- DNS resolution test
- TCP connection test
- MySQL readiness checks

All this appears at the start of your deployment logs.

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

