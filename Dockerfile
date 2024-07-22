FROM php:8.2-fpm

RUN echo "deb http://deb.debian.org/debian buster main contrib non-free" > /etc/apt/sources.list

RUN apt-get update && \
    apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    unzip \
    wget \
    libxrender1 \
    libfontconfig1 \
    libx11-dev \
    libjpeg62-turbo \
    libssl1.1 \
    xfonts-base \
    xfonts-75dpi \
    fontconfig \
    && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install zip pdo_mysql mbstring exif pcntl bcmath gd

RUN apt-get update && \
    apt-get install -y libxml2-dev && \
    docker-php-ext-install soap

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html

RUN pecl channel-update pecl.php.net && \
    pecl install xdebug && \
    docker-php-ext-enable xdebug

RUN chown -R www-data:www-data /var/www/html

CMD ["php-fpm"]
