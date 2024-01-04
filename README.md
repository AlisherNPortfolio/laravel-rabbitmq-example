# RabbitMQ Example On Laravel Framework[en]

This is an example for working with rabbitmq message broker in laravel microservice architecture projects.

First of all, you should install rabbitmq into your machine (installation guide given in the official [website](https://www.rabbitmq.com/download.html)).

In this example, there are two service projects: producer and consumer. The producer project validates post data and uploades its picture file into server, then sends ready post data to consumer project (the ready data is sent to rabbitmq, in turn the consumer gets it from rabbitmq).

The consumer project saves the data into database.

# Installation

Producer project:

1. `composer install`
2. `php artisan key:generate`
3. `php -S localhost:9090 -t public`

Consumer project:

1. `composer install`
2. `php artisan key:generate`
3. Set your database settings into `env` file
4. `php artisan migrate`
5. `php -S localhost:9091 -t public`

# RabbitMQ settings

RabbitMQ settings are in the `env` file.

`RABBITMQ_HOST` - host (default `localhost`)

`RABBITMQ_PORT` - port (default `5672`)

`RABBITMQ_USER` - user (default `user`)

`RABBITMQ_PASS` - password (default `pass`)

# Laravel freymvorkida RabbitMQ ishlashiga sodda misol[uz]

Ushbu misolda laravelda mikroservis arxitekturasi yordamida yaratilgan proyektlarda rabbitmq messej brokeri bilan ishlash keltirilgan.

Ushbu proyektlarni ishlatib ko'rish uchun, rabbitmq dasturini qurilmangizga o'rnatishingiz kerak (o'rnatish bo'yicha qo'llanma [saytda](https://www.rabbitmq.com/download.html) keltirilgan)

Bu misolda ikkita servis proyekt mavjud: producer va consumer. Producer proyekti maqola ma'lumotlarini validatsiya qilib, undagi rasm faylini serverga yuklaydi va, keyin tayyor bo'lgan maqola ma'lumotlarini consumer proyektiga yuboradi (avval rabbitmq-ga yuboriladi, consumer proyekti rabbitmq-dan oladi)

Consumer proyektni maqola ma'lumotlarini olib, ularni ma'lumotlar bazasiga yozib qo'yadi

# O'rnatish

Producer proyekti:

1. `composer install`
2. `php artisan key:generate`
3. `php -S localhost:9090 -t public`

Consumer proyekti:

1. `composer install`
2. `php artisan key:generate`
3. Ma'lumotlar bazasi sozlamarini `env` faylga yozib qo'ying.
4. `php artisan migrate`
5. `php -S localhost:9091 -t public`

# RabbitMQ sozlamari

RabbitMQ-ning sozlamari `env` fayliga yoziladi.

`RABBITMQ_HOST` - host (boshlang'ich holatda `localhost`)

`RABBITMQ_PORT` - port (boshlang'ich holatda `5672`)

`RABBITMQ_USER` - user (boshlang'ich holatda `user`)

`RABBITMQ_PASS` - parol (boshlang'ich holatda `pass`)
