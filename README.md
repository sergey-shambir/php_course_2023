# Минимальный пример поэтапного конструирования блога на PHP

> Пример дополняется, пока продолжается курс.

## Запуск примера

Запуск веб-сервера из каталога проекта:

```bash
php -S localhost:8000 -t public/
```

Для Linux доступны вспомогательные скрипты:

1. `bin/connect-mysql.sh` — запускает MySQL 8 в Docker, подключая его к порту 3306
2. `bin/run-php-webserver.sh` — запускает встроенный веб-сервер PHP на порту 8000
3. `bin/connect-mysql.sh` — запускает сессию MySQL
