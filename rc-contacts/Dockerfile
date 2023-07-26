# Stage 1: Build the Laravel application and install Composer dependencies
FROM composer:2.1 as builder

WORKDIR /app

COPY composer.json composer.lock ./
RUN composer install --no-dev --no-interaction --no-plugins --no-scripts --optimize-autoloader

COPY . .

# Stage 2: Use a smaller PHP-FPM base image and copy only necessary files from the builder stage
FROM php:7.4-fpm-alpine

WORKDIR /var/www/html

COPY --from=builder /app /var/www/html

# Install system dependencies and PHP extensions
RUN apk add --no-cache \
    git \
    unzip \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    libzip-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql zip \
    && rm -rf /var/cache/apk/* /tmp/*

# Create database tables
RUN php artisan migrate

# Expose port 9000 to communicate with the PHP-FPM server
EXPOSE 9000

# Set up entrypoint to start PHP-FPM server
CMD ["php-fpm"]
