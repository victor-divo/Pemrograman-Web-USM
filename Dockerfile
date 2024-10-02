FROM php:7.3-apache

# docker php extension installer
ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

RUN chmod +x /usr/local/bin/install-php-extensions && sync && \
    install-php-extensions gd mysqli pdo_mysql calendar zip mcrypt @composer

RUN apt update && apt install nano

# RUN a2enmod rewrite && a2enmod headers
RUN a2enmod headers && a2enmod ssl && service apache2 start &&  a2enmod rewrite && service apache2 reload

ENTRYPOINT /usr/sbin/apachectl -D FOREGROUND