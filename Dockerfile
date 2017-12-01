FROM php:7.1-apache
RUN a2enmod rewrite
RUN mkdir -p /var/www/app/
RUN bash
