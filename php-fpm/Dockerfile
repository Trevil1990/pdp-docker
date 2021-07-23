# Dockerfile
FROM php:fpm
# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN mkdir /application
COPY composer.json /application
RUN cd /application && composer update