FROM php:8.1-fpm

COPY --from=composer:2.2 /usr/bin/composer /usr/bin/composer

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    libpq-dev \
    libonig-dev \
    libzip-dev

RUN docker-php-ext-install pdo_mysql

WORKDIR /var/www