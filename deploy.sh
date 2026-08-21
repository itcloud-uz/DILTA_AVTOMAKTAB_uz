#!/bin/bash
# ==============================================================================
# DELTA_AVTOMAKTAB_UZ - Automated Linux Production Deployment Script
# Supports: Ubuntu 20.04 / 22.04 / 24.04 LTS, Debian 11 / 12
# ==============================================================================

set -e

echo "🚀 Starting DELTA_AVTOMAKTAB_UZ Production Deployment..."

# 1. Update system packages
echo "📦 Updating apt packages..."
sudo apt-get update -y && sudo apt-get upgrade -y
sudo apt-get install -y curl wget git build-essential nginx

# 2. Install Node.js 20.x LTS if not installed
if ! command -v node &> /dev/null; then
    echo "📥 Installing Node.js 20.x LTS..."
    curl -fsSL https://deb.nodesource.com/setup_20.x | sudo -E bash -
    sudo apt-get install -y nodejs
fi

echo "✅ Node.js version: $(node -v)"
echo "✅ NPM version: $(npm -v)"

# 3. Install PM2 globally if not present
if ! command -v pm2 &> /dev/null; then
    echo "📥 Installing PM2 globally..."
    sudo npm install -g pm2
fi

# 4. Setup application directory permissions
APP_DIR="/var/www/delta_avtomaktab"
if [ "$PWD" != "$APP_DIR" ]; then
    echo "📁 Deploying in current directory: $PWD"
    APP_DIR="$PWD"
fi

cd "$APP_DIR"

# 5. Install NPM production dependencies
echo "📦 Installing production dependencies..."
npm ci --omit=dev

# 6. Ensure required directories and permissions
echo "📁 Setting up storage & database directories..."
mkdir -p database public storage/logs
chmod -R 775 database storage

# 7. Check if SQLite database exists, populate if missing
if [ ! -f "database/database.sqlite" ]; then
    echo "📊 Initializing database with 2,206 questions..."
    node populate_db_questions.js
fi

# 8. Start / Restart application via PM2
echo "⚡ Starting/Restarting application with PM2..."
pm2 start ecosystem.config.cjs || pm2 restart delta-avtomaktab
pm2 save

# 9. Setup PM2 startup script on reboot
sudo env PATH=$PATH:/usr/bin /usr/lib/node_modules/pm2/bin/pm2 startup systemd -u $USER --hp $HOME || true

# 10. Health check verification
echo "🔍 Running Healthcheck on localhost:8000..."
sleep 3
if curl -s http://localhost:8000/health | grep -q "UP"; then
    echo "🎉 Application is healthy and running successfully on port 8000!"
else
    echo "⚠️ Warning: Healthcheck did not return UP. Checking PM2 logs..."
    pm2 logs delta-avtomaktab --lines 15 --nostream
fi

echo "=============================================================================="
echo "🚀 Deployment Completed Successfully!"
echo "👉 Local access: http://localhost:8000"
echo "👉 Health probe: http://localhost:8000/health"
echo "👉 PM2 Status:   pm2 status"
echo "👉 PM2 Logs:     pm2 logs delta-avtomaktab"
echo "=============================================================================="
