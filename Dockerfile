FROM php:8.2-fpm

# Install dependencies including Nginx
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    curl \
    nginx \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    libicu-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql bcmath zip intl

# Set up Git safe directory
RUN git config --global --add safe.directory /var/www/html

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy project files
COPY . .

# Remove default nginx config (if exists) and copy our config into /etc/nginx/conf.d/
RUN rm -f /etc/nginx/conf.d/default.conf
COPY nginx.conf /etc/nginx/conf.d/default.conf

# Install Laravel dependencies
RUN composer install --no-dev --optimize-autoloader --ignore-platform-reqs

# Set proper permissions for Laravel storage folders
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Expose static port 80
EXPOSE 80

# Start PHP-FPM (background) and nginx in the foreground
CMD ["sh", "-c", "php-fpm & nginx -g 'daemon off;'"]
