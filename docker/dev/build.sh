#!/bin/sh

docker run --rm \
    -v "$(pwd):/var/www/" \
    -w /var/www/ \
    hyperf/hyperf:8.2-alpine-vedge-swoole-v5.0.3 \
    composer install

docker compose up --build
