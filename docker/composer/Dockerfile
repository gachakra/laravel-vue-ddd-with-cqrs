FROM composer

MAINTAINER gachakra <gachakra.kangin@notonza.dev>

ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /composer
ENV PATH $PATH:/composer/vendor/bin


########################################################################
# change packagist mirror server to JP one and install concurrent installer to accelerate
RUN composer config -g repos.packagist composer https://packagist.jp \
    && composer global require hirak/prestissimo
