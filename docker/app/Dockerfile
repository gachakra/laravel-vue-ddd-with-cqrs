FROM php:7.3-fpm-alpine

MAINTAINER gachakra <gachakra.kangin@notonza.dev>


###########################################################
# Initialize

# set Timezone JST
RUN apk --update add tzdata \
    && cp /usr/share/zoneinfo/Asia/Tokyo /etc/localtime \
    && apk del tzdata \
    && rm -rf /var/cache/apk/*


# Libraries
RUN apk upgrade --update \
    && apk --no-cache add \
       icu-dev autoconf make g++ gcc sudo vim unzip zip mysql-client ncurses-dev libxslt-dev libc-dev



###########################################################
# PHP
COPY php.ini /usr/local/etc/php/

RUN docker-php-ext-install -j$(nproc) iconv intl mbstring pdo_mysql opcache \
    && pecl install xdebug-2.7.0beta1 \
    && docker-php-ext-enable xdebug


# register PHP-FPM to service
COPY php-fpm.init.sh /etc/init.d/php-fpm
RUN chmod 755 /etc/init.d/php-fpm

RUN apk add openrc \
    && rc-update add php-fpm default



###########################################################
# Composer

COPY --from=composer /usr/bin/composer /usr/bin/composer

ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /composer
ENV PATH $PATH:/composer/vendor/bin

# change packagist mirror server to JP one and install concurrent installer to accelerate
RUN composer config -g repos.packagist composer https://packagist.jp \
    && composer global require hirak/prestissimo



###########################################################
# NPM & Yarn
RUN apk add --update nodejs nodejs-npm \
    && touch ~/.bashrc \
    && curl -o- -L https://yarnpkg.com/install.sh | ash \
    && ln -s "$HOME/.yarn/bin/yarn" /usr/local/bin/yarn



###########################################################
# Project Root
RUN mkdir -p /var/www/laravel-vue-ddd-with-cqrs
