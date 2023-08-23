FROM php:8.1-fpm-buster

ENV APP_ROOT /app

RUN apt update \
    && apt upgrade -y \
    && apt install -y \
    git \
    zip \
    unzip

RUN adduser --disabled-password --gecos "" docker;
RUN usermod -u 1000 docker
RUN mkdir -p /app
RUN chown -R 1000:1000 $APP_ROOT

# Install Composer
COPY --from=composer:lts /usr/bin/composer /usr/local/bin/composer

# Set working directory
WORKDIR $APP_ROOT

USER docker

CMD composer install --no-interaction --no-progress && php-fpm