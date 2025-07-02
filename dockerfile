FROM php:8.2-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    libpq-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Install Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy source code
COPY . .

# Install Laravel dependencies
RUN composer install --optimize-autoloader --no-dev

# Set permissions
RUN chown -R www-data:www-data storage bootstrap/cache

# Jalankan migrate & cache saat start, tunggu DB siap
CMD bash -c '\
    for i in {1..15}; do \
        echo "🔍 Checking DB connection... ($i)"; \
        php artisan migrate:status && break; \
        echo "⏳ Waiting for DB..."; \
        sleep 2; \
    done; \
    if ! php artisan migrate:status; then \
        echo "❌ Database not reachable, aborting!"; \
        exit 1; \
    fi && \
    echo "✅ Running migration..." && \
    php artisan migrate --force && \
    php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache && \
    php-fpm'
