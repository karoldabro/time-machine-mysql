# Time machine mysql driver
Mysql driver for [kdabrow/time-machine](https://github.com/karoldabro/time-machine) package.

## Installation
```shell
composer require kdabrow/time-machine-mysql
```

## Testing
Start docker container
```shell
docker compose up -d
```
Run tests from inside containers
```shell
docker compose exec php7.2 composer update && vendor/bin/phpunit
```
### Available containers:
- php7.2
- php7.3
- php7.4
- php8.0
- php8.1