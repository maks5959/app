

    #------------------------------------------
    # PHP-FPM Dockerfile and my php
    #------------------------------------------
     
FROM php:7.3-fpm-alpine3.10
     
RUN apk update && apk add --no-cache php-bcmath \
    mc \
    nano \
    php-json \
    php-mbstring \
    php-tokenizer \
    php-xml \
    php-curl \
    php7-dev \
    php7-dev \
    libmemcached-dev \
    libpng-dev \
    zlib-dev 
#    && docker-php-ext-install gd mysqli
     
    WORKDIR /var/www/test/sss
     
    COPY /home/maks/app/php-fpm/html/ /var/www/test/sss 
     
    CMD ["php-fpm"]
