# Stage 1: install composer dependencies
FROM composer:latest AS vendor
WORKDIR /app
COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader --no-interaction --ignore-platform-reqs

# Stage 2: production image
FROM php:8.3-fpm-alpine
RUN apk add --no-cache zip unzip libzip-dev \
    && docker-php-ext-install zip
WORKDIR /app
COPY --from=vendor /app/vendor ./vendor
RUN mkdir -p web/assets runtime \
    && chmod 777 web/assets runtime
