FROM php:8.2-cli

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

# Copy project files
COPY . .

# Install Laravel dependencies
RUN composer install --optimize-autoloader --no-dev

# Set folder permissions
RUN chown -R www-data:www-data storage bootstrap/cache

# Jalankan Laravel
CMD bash -c '\
    echo "== ENV =="; env; \
    PORT=${PORT:-8080}; \
    until php artisan migrate:status > /dev/null 2>&1; do \
        echo "⏳ Waiting for database..."; \
        sleep 2; \
    done && \
    echo "✅ Database ready. Running migration..." && \
    php artisan migrate --force && \
    php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache && \
    php artisan serve --host=0.0.0.0 --port=$PORT'

