FROM php:8.0-fpm

# Install PHP extensions
RUN apt-get update && apt-get install -y \
      libpq-dev \
    && rm -r /var/lib/apt/lists/* \
    && docker-php-ext-install \
      pdo_pgsql \
      pgsql \
      opcache
