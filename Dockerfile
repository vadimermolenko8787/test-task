FROM php:8.3-fpm-alpine

RUN apk add --no-cache zip unzip libzip-dev \
    && docker-php-ext-install zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

RUN mkdir -p web/assets runtime \
    && chmod 777 web/assets runtime
