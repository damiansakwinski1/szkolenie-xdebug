FROM php:8.0-apache

RUN pecl install xdebug && docker-php-ext-enable xdebug
COPY docker-php-ext-xdebug.ini /usr/local/etc/php/conf.d/.
COPY src /var/www/html/src
COPY index.php /var/www/html/.
