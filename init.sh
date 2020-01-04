#!/usr/bin/env bash


########################################################################
# Copy all `.env.example` files as `.env` recursively (Non-overwriting)
echo 'Copying .env.example files to .env files'

for file in `\find . -name '.env.example'`; do

    if [[ $file == ./vendor* ]]
    then
      echo 'Skip to copy' $file
      continue

    else
      echo cp -n "$file" "${file/.env.example/.env}"
      cp -n "$file" "${file/.env.example/.env}"

    fi
done


########################################################################
# Build Docker images and launch containers
docker-compose build --no-cache --parallel \
&& docker-compose up -d --force-recreate