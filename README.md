# laravel-vue-ddd-with-cqrs
## Quick Start
```
# - copy all .env.example files to each .env file recursively (non-overwriting)
# - generate laravel app key if not exists
# - build and launch docker containers
./init.sh

# build docker images and launch containers manually
docker-compose build --parallel && docker-compose up -d

# login docker app container
docker exec -it app ash
```
then open `http://localhost:8888` in your browser
