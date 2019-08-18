# laravel-vue-ddd-with-cqrs
## Quick Start
```
# copy all .env.example files to each .env file recursively (non-overwriting)
# and generate laravel app key if not exists
./init.sh

# build docker images and launch containers
docker-compose build --parallel && docker-compose up -d
```
then open `http://localhost:8888` in your browser
