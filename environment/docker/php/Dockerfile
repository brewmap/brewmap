FROM php:7.4.9-fpm-alpine

RUN apk update && apk upgrade \ 
    && apk add --no-cache php7-pear php7-dev gcc musl-dev make

ARG COMPOSER_VERSION
ENV COMPOSER_HOME=/application/.composer
ENV COMPOSER_MEMORY_LIMIT=-1

RUN curl -sS https://getcomposer.org/installer | php -- --version=${COMPOSER_VERSION} --install-dir=/usr/local/bin --filename=composer
RUN docker-php-ext-install mysqli pdo pdo_mysql json
RUN pecl install -o -f redis
RUN docker-php-ext-enable redis

