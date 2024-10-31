FROM php:8.3-apache

RUN docker-php-ext-install \
    mysqli \
    pdo \
    pdo_mysql


RUN apt-get update && apt-get install -y --no-install-recommends \
    bash \
    mc \
    telnet \
    nodejs \
    npm \
    zip \
    unzip \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* # cleans up the cache

RUN curl -sS https://getcomposer.org/installer -o composer-setup.php
RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer

# Apache configs + document root.
RUN echo "ServerName laravel-app.local" >> /etc/apache2/apache2.conf

ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Enable apache
RUN a2enmod rewrite headers
ADD . /var/www/html
