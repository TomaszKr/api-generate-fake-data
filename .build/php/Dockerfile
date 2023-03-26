FROM php:8.2-apache 

ARG CUSTOM_NAME=www-data
ARG DEBUG=0

RUN apt-get update -y

RUN apt-get install -y \
    p7zip-full \
    libz-dev \
    libzip-dev \
    libicu-dev 

RUN if [ "1" = "$DEBUG" ]; then \   
 pecl install xdebug \
    && docker-php-ext-enable xdebug \
 ; else \
 echo 'Skip install debug package' ; \   
fi;

RUN docker-php-ext-install zip intl
RUN docker-php-ext-enable zip sodium intl

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install Symfony
RUN curl -sS https://get.symfony.com/cli/installer | bash
RUN mv /root/.symfony5/bin/symfony /usr/local/bin/symfony

# Copy configuration Apache2
COPY ./apache2/config/000-default.conf /etc/apache2/sites-available/000-default.conf

RUN useradd -ms /bin/bash $CUSTOM_NAME
RUN usermod -aG sudo $CUSTOM_NAME
USER $CUSTOM_NAME
 
WORKDIR /var/www/html
