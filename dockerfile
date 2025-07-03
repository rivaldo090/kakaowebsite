FROM laravelsail/php83-composer:latest

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    curl \
    nodejs \
    npm \
    netcat-openbsd \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd \
    && rm -rf /var/lib/apt/lists/*

# Set working directory
WORKDIR /var/www

# Copy entire project
COPY . .

# Install PHP and JS dependencies
RUN composer install --no-dev --optimize-autoloader --no-interaction \
    && npm install \
    && npm run build \
    && npm install -g vite

# Set proper permissions
RUN chmod -R 775 storage bootstrap/cache

# Expose Laravel port
EXPOSE 8080

# Laravel + MySQL wait + migrate + run
CMD ["sh", "-c", "\
  echo '🔄 Menunggu koneksi ke MySQL di $DB_HOST:$DB_PORT...' && \
  while ! nc -z \"$DB_HOST\" \"$DB_PORT\"; do \
    echo '⏳ MySQL belum siap, menunggu...' && sleep 5; \
  done && \
  echo '✅ MySQL terkoneksi, lanjut migrasi...' && \
  php artisan migrate --force || { echo '❌ Migrasi gagal!'; php artisan migrate:status; exit 1; } \
  php artisan config:clear && \
  php artisan cache:clear && \
  php artisan config:cache && \
  php artisan route:cache && \
  php artisan view:cache && \
  php artisan storage:link && \
  echo '🚀 Menjalankan Laravel server...' && \
  php artisan serve --host=0.0.0.0 --port=8080 \
"]
