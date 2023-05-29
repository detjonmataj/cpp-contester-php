FROM php:8.2.0RC6-apache-bullseye

RUN a2enmod rewrite
COPY . /var/www/html/

RUN docker-php-ext-install pdo pdo_mysql

EXPOSE 80

ENTRYPOINT ["bash", "-c", "apache2-foreground"]