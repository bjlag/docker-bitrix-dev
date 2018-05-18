# Docker Bitrix Dev

Окружение предназначено для локальной разработки и адаптированно под CMS 1С-Битрикс.

Окружение построено на Docker, с применением менеджера контейнеров docker-compose, который развернет окружение, состоящее из следующих компонент:

* Nginx 1.13
* PHP 7.1
* MySQL 5.7
* sSMTP
* Xdebug:latest
* OPcache:latest
* phpMyAdmin 

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
|- docker-compose.yml
```

## Клонируем репозиторий

````
git clone https://github.com/bjlag/docker-bitrix-dev.git
````

## Настройка

### Подключение к базе MySQL

Параметры подключения указываются в файле _docker-compose.yml_ у контейнера **db** в секции **environment**.

````
Хост:                   db
Имя базы:               dev
Имя пользователя:       dev
Пароль пользователя:    dev
````

Файлы базы хранятся в папке _/docker/var/data/mysql_.

**phpMyAdmin** по адресу _dev.local:8080_.

Чтобы подключиться, например, через MySQLWorkbench указываем:

````
Хост:                   localhost
Порт:                   3306
Имя пользователя:       dev
Пароль пользователя:    dev
````

### Отправка почты через sSMTP

Конфигурационные файлы:

* /docker/php71/ssmtp/ssmtp.conf
* /docker/php71/ssmtp/revaliases

Все готово для отправки через Yandex. Пользователя и пароль SMTP сервера указываем в _ssmtp.conf_. В файле _revaliases_ обазательно указать email, с которого отравляется почта. 

Для отравки через Gmail закомментировать сроку с параметром **UseTLS=YES** и раскомментировать **UseSTARTTLS=YES**.

## Сборка

Выполнить команду:

```
docker-compose up -d --build
```

Сайт будет доступен по адресу _localhost:8888_.

Чтобы сайт открывался по доменному имени, например, _dev.local:8888_, добавляем запись в файл _/etc/hosts_.

```
127.0.0.1       dev.local
```

Чтобы изменения вступили в силу, рекомендуется выполнить в терминале команду (macOS) для обновления DNS записей:

```
dscacheutil -flushcache
```

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

## Полезные скрипты

[bitrixsetup.php](http://www.1c-bitrix.ru/download/scripts/bitrixsetup.php)  
[restore.php](http://www.1c-bitrix.ru/download/scripts/restore.php)