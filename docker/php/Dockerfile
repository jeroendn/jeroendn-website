FROM php:8.5-apache

RUN apt-get update && apt-get install -y --no-install-recommends \
    bash \
    mc \
    telnet \
    zip \
    unzip \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* # cleans up the cache

RUN docker-php-ext-install -j"$(nproc)" \
    mysqli \
    pdo \
    pdo_mysql

# Node + npm copied from the official image instead of Debian's nodejs/npm packages
COPY --from=node:22-bookworm-slim /usr/local/bin/node /usr/local/bin/node
COPY --from=node:22-bookworm-slim /usr/local/lib/node_modules /usr/local/lib/node_modules
RUN ln -s /usr/local/lib/node_modules/npm/bin/npm-cli.js /usr/local/bin/npm \
    && ln -s /usr/local/lib/node_modules/npm/bin/npx-cli.js /usr/local/bin/npx

RUN curl -sS https://getcomposer.org/installer \
    | php -- --install-dir=/usr/local/bin --filename=composer

# Apache configs + document root.
RUN echo "ServerName laravel-app.local" >> /etc/apache2/apache2.conf

ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Enable apache
RUN a2enmod rewrite headers

# The legacy standalone projects (public/project/*) read their database
# credentials from the native PHP session; prepend a script that seeds those
# values from .env for every PHP request under that directory.
RUN { \
        echo '<Directory ${APACHE_DOCUMENT_ROOT}/project>'; \
        echo '    php_admin_value auto_prepend_file /var/www/html/bootstrap/legacy-projects-session.php'; \
        echo '</Directory>'; \
    } > /etc/apache2/conf-available/legacy-projects.conf \
    && a2enconf legacy-projects
