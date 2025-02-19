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

# Copy project files and Nginx config
COPY . .
COPY nginx.conf /etc/nginx/nginx.conf

# Install Laravel dependencies
RUN composer install --no-dev --optimize-autoloader --ignore-platform-reqs

# Set proper permissions for Laravel storage folders
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Expose port 80 (static)
EXPOSE 80

# Start both PHP-FPM and Nginx concurrently
CMD ["sh", "-c", "php-fpm & nginx -g 'daemon off;'"]
