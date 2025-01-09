FROM composer:2.8.3 AS composer

FROM php:8.3-alpine

#Install required system dependencies
RUN apk add zip curl 

#set working directory
WORKDIR /var/www
COPY . .

#copy composer binary from image
COPY --from=composer /usr/bin/composer /usr/bin/composer

#Install composer dependencies
RUN composer install --optimize-autoloader

RUN docker-php-ext-install pdo pdo_mysql

#prints the contents of the vendor/bin folder for debugging
RUN ls -al /var/www/vendor/

RUN chmod +x ./run.sh

CMD ["./run.sh"]
