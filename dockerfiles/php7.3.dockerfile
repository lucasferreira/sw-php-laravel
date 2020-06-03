FROM php:7.3-fpm-alpine

# Instalando extensões necessárias do PHP
RUN set -xe \
  && apk add --update --no-cache \
    $PHPIZE_DEPS bash ca-certificates wget alpine-sdk autoconf curl curl-dev \
    freetype-dev libjpeg-turbo-dev libwebp-dev zlib-dev libxpm-dev \
    libxml2-dev jpeg-dev libwebp-dev openldap-dev libmcrypt-dev \
    libpng-dev libxslt-dev libzip-dev

ENV LC_ALL=en_US.UTF-8
ENV LANGUAGE=en_US.UTF-8
ENV LANG=en_US.UTF-8

# LOCALE
ENV MUSL_LOCPATH=/usr/local/share/i18n/locales/musl
RUN apk add --update git cmake make musl-dev gcc gettext-dev libintl
RUN cd /tmp && git clone https://github.com/rilian-la-te/musl-locales.git
RUN cd /tmp/musl-locales && cmake . && make && make install

RUN docker-php-source extract
RUN docker-php-ext-install \
    bcmath calendar mbstring \
    mysqli pdo pdo_mysql sockets xml xsl zip

RUN docker-php-ext-configure gd \
    --with-gd \
    --with-webp-dir=/usr/include/ \
    --with-freetype-dir=/usr/include/ \
    --with-png-dir=/usr/include/ \
    --with-jpeg-dir=/usr/include/ && \
  NPROC=$(grep -c ^processor /proc/cpuinfo 2>/dev/null || 1) && \
  docker-php-ext-install -j${NPROC} gd

RUN docker-php-source delete

# Instalando o Composer
RUN php -r "copy('http://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN mv composer.phar /usr/local/bin/composer
RUN composer global require hirak/prestissimo

RUN rm /var/cache/apk/*
