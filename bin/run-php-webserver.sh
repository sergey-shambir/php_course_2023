#!/usr/bin/env bash

set -o errexit

PROJECT_DIR=$(dirname "$(dirname "$0")")

exec php -S 127.0.0.1:8000 -t "$PROJECT_DIR/public"
