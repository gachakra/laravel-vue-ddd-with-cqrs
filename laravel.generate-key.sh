#!/usr/bin/env ash

if grep -qE "^APP_KEY=.+?$" ./.env; then
    echo "Laravel app key already exists"
fi

# generate app key for laravel and set it root .env file
if grep -qE "^APP_KEY=$" ./.env; then
    php artisan key:generate
    php artisan config:cache
fi