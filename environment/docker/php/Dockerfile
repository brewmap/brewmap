FROM php:7.4.9-fpm-alpine

ARG COMPOSER_VERSION
ENV COMPOSER_HOME=/application/.composer
RUN curl -sS https://getcomposer.org/installer | php -- --version=${COMPOSER_VERSION} --install-dir=/usr/local/bin --filename=composer
