#!/usr/bin/env bash

set -o errexit

exec docker run --rm \
  -p 127.0.0.1:3306:3306 \
  --name=php-course-db \
  -e MYSQL_ALLOW_EMPTY_PASSWORD=yes \
  -e MYSQL_USER=php-course-app \
  -e MYSQL_PASSWORD=gX5t2UUbBn \
  -e MYSQL_DATABASE=php_course \
  mysql:8.0.32