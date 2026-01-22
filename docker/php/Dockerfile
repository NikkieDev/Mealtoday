FROM php:8.4-apache

RUN apt-get update && apt-get install -y \
    libicu-dev \
    pkg-config \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl pdo pdo_mysql 

EXPOSE 80
