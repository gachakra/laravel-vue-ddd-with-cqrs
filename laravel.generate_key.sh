#!/usr/bin/env ash

# generate app key for laravel and set it root .env file
if grep -qE "^APP_KEY=$" ./.env; then
    php artisan key:generate
    php artisan config:cache
fi