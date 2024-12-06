FROM composer:2.8.3 AS composer

FROM php:8.3-alpine
WORKDIR /var/www
COPY . .
COPY --from=composer /usr/bin/composer /usr/bin/composer

RUN composer update

RUN docker-php-ext-install pdo pdo_mysql

RUN chmod +x ./run.sh

CMD ["./run.sh"]
