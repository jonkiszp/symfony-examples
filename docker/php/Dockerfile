FROM php:8.4-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libicu-dev \
    libpq-dev \
    zip \
    unzip \
    git \
    && docker-php-ext-install intl pdo pdo_pgsql

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html