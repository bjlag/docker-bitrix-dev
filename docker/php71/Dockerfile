FROM php:7.1-fpm

RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        libpq-dev \
        libmemcached-dev \
        libjpeg-dev \
        libpng-dev \
        libfreetype6-dev \
        libssl-dev \
        libmcrypt-dev \
        curl \
        ssmtp \
    && docker-php-ext-configure gd \
        --enable-gd-native-ttf \
        --with-jpeg-dir=/usr/include \
        --with-freetype-dir=/usr/include \
    && docker-php-ext-install -j$(nproc) \
        mcrypt \
        opcache \
        gd \
        mysqli \
        pdo_mysql \
    && pecl install \
        xdebug \
        memcached \
    && docker-php-ext-enable \
        memcached \
        xdebug \
    && docker-php-source delete \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/cache/apt/*

RUN usermod -u 1000 www-data

WORKDIR /var/www/html

EXPOSE 9000

CMD ["php-fpm"]