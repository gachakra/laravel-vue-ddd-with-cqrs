# laravel-vue-ddd-with-cqrs

## Quick Start
```bash
# - copy all .env.example files to each .env file recursively (non-overwriting)
# - generate laravel app key if not exists
# - build docker images and launch containers

./init.sh
```

then open `http://localhost:8888` in your browser
npm `Hot Module Replacement` enabled


## Login docker container
```bash
docker exec -it <container_name> ash

# login app container
docker exec -it app ash
```


## Build docker images and launch containers manually
```bash
docker-compose build --parallel && docker-compose up -d

# recreate all docker containers
docker-compose up -d --force-recreate
```


## Install or update composer packages by itself
### Install
```bash
docker-compose run composer

# or if you want remove container after install
docker-compose run --rm composer
```
### Update
```bash
docker-compose run composer update

# or if you want remove container after update
docker-compose run --rm composer update
```
### Dump-autoload
```bash
docker-compose run composer dump-autoload (or dumpautoload)

# or if you want remove container after dump-autoload
docker-compose run --rm composer dump-autoload (or dumpautoload)
```