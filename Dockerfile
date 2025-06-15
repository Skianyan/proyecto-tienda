FROM nixpacks/php:latest-8.2

# Install dependencies
RUN composer install --no-dev --optimize-autoloader

# Build assets (if using Laravel Mix/Vite)
RUN npm install && npm run build

# Copy project files
COPY . /var/www/html

# Set permissions
RUN chown -R www-data:www-data /var/www/html/storage \
    /var/www/html/bootstrap/cache

# Use Caddy as web server
EXPOSE 8080
CMD ["caddy", "run", "--config", "/etc/caddy/Caddyfile", "--adapter", "caddyfile"]