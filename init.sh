#!/usr/bin/env bash

# cp all `.env.example` files as `.env` recursively (Non-overwriting)
for file in `\find . -name '.env.example'`; do
    echo cp -n "$file" "${file/.env.example/.env}"
    cp -n "$file" "${file/.env.example/.env}"
done

# generate app key for laravel and set it root .env file
if grep -qE "^APP_KEY=$" ./.env; then
    php artisan config:clear
    php artisan key:generate
fi
