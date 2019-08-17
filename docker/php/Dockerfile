FROM php:7.3-fpm-alpine

MAINTAINER gachakra <gachakra.kangin@notonza.dev>

# Timezone (JST)
RUN apk --update add tzdata \
    && cp /usr/share/zoneinfo/Asia/Tokyo /etc/localtime \
    && apk del tzdata \
    && rm -rf /var/cache/apk/*
# check Timezone
# RUN dpkg-reconfigure -f noninteractive tzdata


# Libraries
RUN apk upgrade --update \
    && apk --no-cache add \
       icu-dev autoconf make g++ gcc sudo vim unzip zip mysql-client


# PHP
COPY php.ini /usr/local/etc/php/

RUN docker-php-ext-install -j$(nproc) iconv intl mbstring pdo_mysql opcache \
  && pecl install xdebug-2.7.0beta1 \
  && docker-php-ext-enable xdebug


# Project Root
RUN mkdir -p /var/www/laravel-vue-ddd-with-cqrs
