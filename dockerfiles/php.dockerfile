FROM php:8.1-fpm-alpine

ARG user
ARG uid
ARG gid

ENV USER=${USER}
ENV UID=${UID}
ENV GID=${GID}

RUN docker-php-ext-install pdo pdo_mysql

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN addgroup -g ${gid} --system $user
RUN adduser -G $user --system -D -s /bin/sh -u ${uid} $user

WORKDIR /var/www/html

USER $user