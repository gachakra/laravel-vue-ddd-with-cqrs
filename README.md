# laravel-vue-ddd-with-cqrs

## Quick Start
```bash
# - copy all .env.example files to each .env file recursively (non-overwriting)
# - generate laravel app key if not exists
# - build docker images and launch containers

./init.sh
```

then open `http://localhost:8888` in your browser.<br>
npm `Hot Module Replacement` enabled from the start in the app container server.


## Handle Docker images and containers
### Build images and launch containers manually
```bash
# build in parallel
docker-compose build --parallel

# build and launch in one liner
docker-compose up -d --build

# launch recreating all docker containers
docker-compose up -d --force-recreate

# launch recreating specific a docker container
# (--no-deps option avoid other depending containers launching)
docker-compose up -d --force-recreate [--no-deps] <service_name>
```

### Login containers
```bash
# app container (built from alpine based image) 
docker exec -it lvdc_app ash

# other containers (build from debian based image)
docker exec -it lvdc_mysql bash
docker exec -it lvdc_redis bash
```


## Install or update packages by itself
use `--rm` option if you want remove the container after its work is done.
### Composer
#### Install packages
```bash
docker-compose run [--rm] composer
```
#### Update package
```bash
docker-compose run [--rm] composer update
```
#### Dump-autoload
```bash
docker-compose run [--rm] composer dumpautoload
# or
docker-compose run [--rm] composer dump-autoload
```

## Yarn
#### Install packages
```bash
docker-compose run [--rm] yarn
# or
docker-compose run [--rm] yarn install
```
#### Update packages
```bash
docker-compose run [--rm] composer yarn upgrade --latest
```
#### Add an package
```bash
docker-compose run [--rm] composer yarn add [-D] <package_name>
```
