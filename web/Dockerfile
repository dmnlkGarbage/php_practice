FROM php:5.6.30-apache

RUN apt-get update && apt-get upgrade -y
RUN docker-php-ext-install pdo_mysql mysqli mbstring

RUN mkdir /var/php -p
WORKDIR /var/php

RUN php -r "readfile('https://getcomposer.org/installer');" > composer-setup.php ;\
php composer-setup.php --filename=composer;\
php -r "unlink('composer-setup.php');" ;\
mv composer /usr/local/bin/composer


