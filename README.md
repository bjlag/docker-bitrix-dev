# DockerDev рабочее окружение для веб-разработки

* Nginx
* Apache
* PHP
* MySQL
* phpMyAdmin 
* Memcached
* Xdebug
* OPcache

## Сборка проекта

```
docker-compose up -d --build
```

Сайт доступен по адресу **localhost**  
phpMyAdmin **localhost:8080**

## Остановить проект

```
docker stop $(docker ps -q )
```

или

```
docker-compose stop
```

или остановка и последующее удаление контейнеров

```
docker-compose down
```

## Структура проекта

```
|- docker  
|    |- data  
|    |    |- mysql          # Данные базы
|    |    |- memcached
|    |- httpd               # Настройки Apache
|    |- mysql               # Настройки MySQL
|    |- nginx               # Настройки Nginx
|    |- php71               # Настройки PHP 7.1
|    |- ssl                 # SSL сертификат
|    |- log                 # Логи
|- src                      # Файлы сайта
|- 
```

## Генерация SSL

```
openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout /paph/to/key/domain.key -out /path/to/key/domain.crt
```

Сгенерированный сертификат кладем в папку `/docker/ssl`.