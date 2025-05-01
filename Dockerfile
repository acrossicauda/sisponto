FROM php:8.2-fpm


RUN apt-get update && apt-get install -y libpq-dev
RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql
RUN docker-php-ext-install pdo pdo_pgsql

RUN apt-get update && apt-get install -y \
    gnupg \
    g++ \
    procps \
    openssl \
    git \
    unzip \
    zlib1g-dev \
    libzip-dev \
    libfreetype6-dev \
    libpng-dev \
    libjpeg-dev \
    libicu-dev  \
    libonig-dev \
    libxslt1-dev \
    acl \
    vim \
    nodejs \
    && echo 'alias sf="php bin/console"' >> ~/.bashrc


# Instalar node e npm
RUN apt-get update && apt-get install -y \
    software-properties-common \
    npm
#RUN npm install npm@latest -g && \
#    npm install n -g && \
#    n latest

RUN docker-php-ext-configure gd --with-jpeg --with-freetype

RUN docker-php-ext-install \
    pdo pdo_mysql zip xsl gd intl opcache exif mbstring

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer


#COPY . /var/www

#WORKDIR /var/www
#RUN #composer install --no-dev -o && php bin/hyperf.php

#CMD ["composer", "start"]
#CMD ["php", "artisan", "serve"]

WORKDIR /var/www/public
CMD ["php", "-S", "0.0.0.0:8000"]
#WORKDIR /var/www
