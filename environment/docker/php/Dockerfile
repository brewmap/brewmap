FROM php:7.4.6-fpm-alpine

ARG COMPOSER_VERSION
RUN curl -sS https://getcomposer.org/installer | php -- --version=${COMPOSER_VERSION} --install-dir=/usr/local/bin --filename=composer