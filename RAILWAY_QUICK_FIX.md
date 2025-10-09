# Quick Fix for Railway MySQL Connection Refused

## 🚨 IMMEDIATE ACTION REQUIRED

Your `DB_HOST` is pointing to the wrong service. Here's how to fix it **right now**:

---

## Step 1: Find Your MySQL Service Name

1. Go to **Railway Dashboard**
2. Look at your **MySQL service card**
3. Note the **exact name** at the top (e.g., "MySQL", "database", "mysql-db")

---

## Step 2: Update DB_HOST Variable

Go to **Railway Dashboard** → **Your Web Service** → **Variables** tab

### Find this variable:
```
DB_HOST = web.railway.internal
```

### Change it to:
```
DB_HOST = ${{MySQL.RAILWAY_PRIVATE_DOMAIN}}
```

> **Important:** Replace `MySQL` with your actual MySQL service name from Step 1

### Example:
- If your MySQL service is named "MySQL": `${{MySQL.RAILWAY_PRIVATE_DOMAIN}}`
- If your MySQL service is named "database": `${{database.RAILWAY_PRIVATE_DOMAIN}}`
- If your MySQL service is named "mysql-prod": `${{mysql-prod.RAILWAY_PRIVATE_DOMAIN}}`

---

## Step 3: Deploy Changes

1. **Commit and push** the updated `start.sh`:
   ```bash
   git add start.sh
   git commit -m "Fix Railway MySQL connection with better diagnostics"
   git push
   ```

2. **Redeploy** the web service in Railway

3. **Watch the logs** for this section:
   ```
   Database Configuration:
   ----------------------
   DB_HOST: ??????  <-- Check this value!
   ```

---

## What to Look For in New Logs

### ✅ Success Indicators:
```
Testing DNS resolution for DB_HOST...
✓ DNS resolution successful for mysql.railway.internal

Testing TCP connection to mysql.railway.internal:3306...
✓ Port 3306 is reachable on mysql.railway.internal

Attempt 1/40: ✓ MySQL is ready!
```

### ❌ Failure Indicators:
```
✗ Cannot resolve hostname: web.railway.internal
✗ Cannot connect to web.railway.internal:3306
```
→ DB_HOST is still wrong, go back to Step 2

---

## Alternative: Use Public Connection (Quick Test)

If the above doesn't work, temporarily try public connection:

```
DB_HOST = ${{MySQL.RAILWAY_TCP_PROXY_DOMAIN}}
DB_PORT = ${{MySQL.RAILWAY_TCP_PROXY_PORT}}
```

If **this works**, you have a private networking issue. If **this also fails**, check:
1. MySQL service is actually running (check its deployment status)
2. Credentials are correct (DB_USERNAME, DB_PASSWORD)

---

## Still Not Working?

### Check These:

1. **MySQL Service Status**
   - Go to MySQL service in Railway
   - Check "Deployments" tab
   - Should say "Active" (green)

2. **Service Name is Correct**
   - The service name is case-sensitive
   - Must match exactly what's shown in Railway dashboard

3. **Both Services in Same Environment**
   - Both MySQL and Web must be in same Railway project/environment
   - Check the environment dropdown at top

4. **Wait for MySQL to Start**
   - On first deploy, MySQL can take 2-3 minutes
   - Try redeploying web service after MySQL is fully up

---

## Quick Commands

```bash
# Commit changes
git add start.sh RAILWAY_DEPLOYMENT.md RAILWAY_QUICK_FIX.md
git commit -m "Add Railway MySQL connection diagnostics"
git push

# Check Railway logs (after deploy)
# Look for the "Database Configuration" section at the start
```

---

## Contact Points

If you're still stuck, share:
1. The "Database Configuration" section from your logs
2. Your MySQL service name (exact spelling)
3. Whether MySQL service shows as "Active" in Railway

