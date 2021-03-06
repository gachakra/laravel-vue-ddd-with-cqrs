FROM php:7.4-fpm-alpine

MAINTAINER gachakra <gachakra.kangin@notonza.dev>


########################################################################
# set Timezone JST
RUN apk --update add tzdata \
    && cp /usr/share/zoneinfo/Asia/Tokyo /etc/localtime \
    && apk del tzdata \
    && rm -rf /var/cache/apk/*


########################################################################
# Libraries
RUN apk upgrade --update \
    && apk --no-cache add \
        icu-dev \
        autoconf \
        make \
        g++ \
        gcc \
        sudo \
        vim \
        unzip \
        zip \
        lsof \
        mysql-client \
        ncurses-dev \
        libxslt-dev \
        libc-dev \
        oniguruma-dev


########################################################################
# PHP
COPY php.ini /usr/local/etc/php/

RUN docker-php-ext-install -j$(nproc) \
        iconv \
        intl \
        mbstring \
        pdo_mysql \
        opcache \
    && pecl install xdebug redis \
    && docker-php-ext-enable xdebug redis

# set {current directory}/vender/bin to path, so that able to run PHPUnit via just `phpunit`
ENV PATH $PATH:./vendor/bin


########################################################################
# register PHP-FPM to service
COPY php-fpm.init.sh /etc/init.d/php-fpm
RUN chmod 755 /etc/init.d/php-fpm

RUN apk add openrc \
    && rc-update add php-fpm default


########################################################################
# NPM & Yarn
RUN apk add --update nodejs nodejs-npm \
    && touch ~/.bashrc \
    && curl -o- -L https://yarnpkg.com/install.sh | ash \
    && ln -s "$HOME/.yarn/bin/yarn" /usr/local/bin/yarn


########################################################################
# Project Root
RUN mkdir -p /var/www/laravel-vue-ddd-with-cqrs
