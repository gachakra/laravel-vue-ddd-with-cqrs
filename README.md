# laravel-vue-ddd-with-cqrs
## Quick Start
```
# - copy all .env.example files to each .env file recursively (non-overwriting)
# - generate laravel app key if not exists
# - build docker images and launch containers
./init.sh
```

## Login docker container
```
docker exec -it <container_name> ash

# login app container
docker exec -it app ash
```

## Build docker images and launch containers manually
```
docker-compose build --parallel && docker-compose up -d

# recreate all docker containers
docker-compose up -d --force-recreate
```

then open `http://localhost:8888` in your browser
