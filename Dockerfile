FROM php:7.4-apache
LABEL maintainer="badr.bechtioui@gmail.com"

########## Packages installation
RUN apt-get update && apt-get install -y --fix-missing \
    mariadb-client \
    imagemagick \
    graphviz \
    git \
    libpng-dev \
    libonig-dev \
    libjpeg62-turbo-dev \
    libmcrypt-dev \
    libxml2-dev \
    libxslt1-dev \
    wget \
    linux-libc-dev \
    libyaml-dev \
    libzip-dev \
    libicu-dev \
    libpq-dev \
    libssl-dev && \
    rm -r /var/lib/apt/lists/*

RUN docker-php-ext-configure gd --with-jpeg=/usr/include/

# Ajouter les extention
RUN docker-php-ext-install \
    mysqli \
    pdo_mysql \
    gd \
    mbstring \
    xsl \
    opcache \
    calendar \
    intl \
    exif \
    ftp \
    bcmath \
    zip


# Install Composer
RUN cd /usr/src && \
    curl -sS http://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer


# Install Xdebug
RUN pecl install xdebug-2.8.1 \
    && docker-php-ext-enable xdebug


########## Increase PHP Configuration
RUN echo "upload_max_filesize = 500M\n" \
    "post_max_size = 500M\n" \
     >> /usr/local/etc/php/conf.d/maxsize.ini

RUN echo 'max_execution_time = 300' >> /usr/local/etc/php/conf.d/maxexectime.ini;


########## APACHE

# Enable Apache "mod_rewrite"
RUN a2enmod rewrite

# Adding vhost
COPY ./config/default.conf /etc/apache2/sites-available/000-default.conf

########## Setup priviliges
RUN usermod -u 1000 www-data

RUN chmod -R 775 /var/www
RUN chown -R www-data:www-data $HOME/.composer/
RUN chown -R www-data:www-data /var/www
RUN chown -R www-data:www-data /usr/local/etc/php

USER www-data
WORKDIR /var/www/html
VOLUME /var/www/html
