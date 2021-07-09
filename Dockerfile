FROM php:7.4-apache 
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

ENV APACHE_DOCUMENT_ROOT=/var/www/html/public


