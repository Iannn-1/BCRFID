FROM php:8.2-fpm

COPY php.ini /usr/local/etc/php/php.ini

RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip \
    vim \
    ca-certificates \
    net-tools \
    ffmpeg \
    libfreetype6-dev libjpeg62-turbo-dev libpng-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install pdo_mysql

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && php -r "unlink('composer-setup.php');"

RUN apt-get update \
  && apt-get install -y --no-install-recommends \
     libcurl4-openssl-dev libssl-dev libftp-dev \
  && docker-php-ext-install -j1 ftp \
  && apt-get clean \
  && rm -rf /var/lib/apt/lists/*

RUN apt-get update && apt-get install -y \
    libgmp-dev \
    && docker-php-ext-install bcmath gmp
