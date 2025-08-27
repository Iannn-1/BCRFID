# Fix Laravel Permissions in Docker Container
Write-Host "🔧 Fixing Laravel permissions in Docker container..." -ForegroundColor Yellow

# Fix storage permissions
docker exec -it rfid-php-1 chown -R www-data:www-data /var/www/html/storage
docker exec -it rfid-php-1 chmod -R 775 /var/www/html/storage

# Fix bootstrap/cache permissions
docker exec -it rfid-php-1 chown -R www-data:www-data /var/www/html/bootstrap/cache
docker exec -it rfid-php-1 chmod -R 775 /var/www/html/bootstrap/cache

Write-Host "✅ Permissions fixed! Laravel should now work properly." -ForegroundColor Green
Write-Host "🌐 Try accessing: http://localhost/login" -ForegroundColor Cyan
