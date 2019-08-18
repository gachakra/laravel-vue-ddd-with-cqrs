# laravel-vue-ddd-with-cqrs
## Quick Start
```
# cp .env.example files to .env files recursively when an .env file doesn't exist
# and generate laravel app key if not exists
./init.sh

# build docker images and launch containers
docker-compose build --parallel && docker-compose up -d
```
then open `http://localhost:8888` in your browser
