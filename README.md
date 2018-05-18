# Docker Bitrix Dev

* Nginx
* PHP
* MySQL
* sSMTP
* phpMyAdmin 
* Xdebug
* OPcache

## Структура папок

```
|- docker  
|    |- var  
|    |    |- data           # Данные, например, база MySQL 
|    |    |- log            # Логи
|    |- mysql               # Настройки MySQL
|    |- nginx               # Настройки Nginx
|    |- php71               # Настройки PHP
|- src                      # Файлы сайта
|- 
```

## Клонируем репозиторий

````
git clone https://github.com/bjlag/docker-bitrix-dev.git
````

## Настройка

### Подключение к базе MySQL

Параметры подключения указываются в файле docker-compose.yml у контейнера db.

````
Хост:                   db
Имя базы:               dev
Имя пользователя:       dev
Пароль пользователя:    dev
````

Файлы базы хранятся в папке **/docker/var/data/mysql**.

### Отправка почты через sSMTP

Конфигурационные файлы:

* /docker/php71/ssmtp/ssmtp.conf
* /docker/php71/ssmtp/revaliases

Все готово для отправки через Yandex. Пользователя и пароль SMTP сервера указываем в **ssmtp.conf**. В файле **revaliases** обазательно указать email, с которого отравляется почта. 

Для отравки через Gmail закомментировать сроку с параметром **UseTLS=YES** и раскомментировать **UseSTARTTLS=YES**.

## Сборка

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