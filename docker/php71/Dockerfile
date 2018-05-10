FROM php:7.1-fpm

RUN apt-get update

RUN docker-php-ext-install \
        pdo \
        pdo_mysql \
        mysqli

RUN pecl install redis-4.0.1 \
    && pecl install xdebug-2.6.0 \
    && docker-php-ext-enable opcache redis xdebug

RUN usermod -u 1000 www-data

WORKDIR /var/www/html

EXPOSE 9000