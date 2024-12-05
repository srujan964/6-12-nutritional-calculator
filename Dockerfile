
FROM php:8.3-alpine
WORKDIR /var/www
COPY . .
COPY vendor /vendor

RUN docker-php-ext-install pdo pdo_mysql

RUN chmod +x ./run.sh

CMD ["./run.sh"]
