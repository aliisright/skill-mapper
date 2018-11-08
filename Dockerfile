FROM php:7.3.0RC4-fpm-alpine3.8

ADD ./app/ /app/

ADD entrypoint.sh /

ADD app-nginx.conf /app-nginx.conf

WORKDIR /app

RUN apk add nginx

RUN apk add --no-cache php7-pdo_pgsql \
                       php7-pgsql \
                       postgresql-client && \
    chmod +x /entrypoint.sh && \
    chown root -R /app && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer &&\
    composer install --no-interaction --prefer-dist && \
    composer dump-autoload --optimize

VOLUME /app/vendor

ENTRYPOINT ["/entrypoint.sh"]

CMD ["dev"]

EXPOSE 80
