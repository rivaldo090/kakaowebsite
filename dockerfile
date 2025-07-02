# Gunakan image resmi PHP
FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libzip-dev \
    libpq-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Install Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Salin semua file ke container
COPY . .

# Install dependensi Laravel
RUN composer install --optimize-autoloader --no-dev

# Ganti permission folder penting Laravel
RUN chown -R www-data:www-data \
    /var/www/storage \
    /var/www/bootstrap/cache

# Jalankan perintah Laravel yang penting
RUN php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache

# Expose port 9000 (FPM default)
EXPOSE 9000

# Jalankan PHP-FPM
CMD ["php-fpm"]
