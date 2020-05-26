FROM ubuntu:18.04

RUN env
RUN useradd -ms /bin/bash -u 73 zzz
WORKDIR /var/www/html

ENV TZ=Europe/Moscow
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone


ARG CONTAINER_ENV

RUN set -x \
    && apt-get update && apt-get install -y gnupg gosu \
    && gosu nobody true

RUN apt-get install symlinks
RUN apt-get install software-properties-common -y && add-apt-repository ppa:ondrej/php
RUN apt-get install vim -y

RUN apt-get update \
    && apt-get install -y curl zip unzip git supervisor sqlite3 \
    && apt-get install -y nginx php7.3-fpm php7.3-cli \
       php7.3-pgsql php7.3-sqlite3 php7.3-gd \
       php7.3-curl php7.3-memcached \
       php7.3-imap php7.3-mysql php7.3-mbstring \
       php7.3-xml php7.3-zip php7.3-bcmath php7.3-soap \
       php7.3-intl php7.3-readline \
       php7.3-msgpack php7.3-igbinary php7.3-ldap \
       php-redis \
    && php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer \
    && mkdir /run/php

RUN if [ "$CONTAINER_ENV" = "local" ]; then apt-get install -y php7.3-xdebug ; fi

RUN apt-get -y autoremove \
        && apt-get clean \
        && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* \
        && sed -i "s/pm\.max_children = .*/pm.max_children = 20/" /etc/php/7.3/fpm/pool.d/www.conf \
        && sed -i "s/pm\.start_servers = .*/pm.start_servers = 10/" /etc/php/7.3/fpm/pool.d/www.conf \
        && sed -i "s/pm\.min_spare_servers = .*/pm.min_spare_servers = 5/" /etc/php/7.3/fpm/pool.d/www.conf \
        && sed -i "s/pm\.max_spare_servers = .*/pm.max_spare_servers = 10/" /etc/php/7.3/fpm/pool.d/www.conf \
        && echo "daemon off;" >> /etc/nginx/nginx.conf

RUN ln -sf /dev/stdout /var/log/nginx/access.log \
    && ln -sf /dev/stderr /var/log/nginx/error.log

COPY h5bp /etc/nginx/h5bp
COPY default /etc/nginx/sites-available/default
COPY promo.conf /etc/nginx/sites-available/promo.conf
COPY php-fpm.conf /etc/php/7.3/fpm/php-fpm.conf
COPY xdebug.ini /etc/php/7.3/mods-available/xdebug.ini
COPY app.ini /etc/php/7.3/fpm/conf.d/99-app.ini
COPY browscap.ini /etc/php/7.3/mods-available/browscap.ini

RUN echo 'browscap=/etc/php/7.3/mods-available/browscap.ini' >> /etc/php/7.3/fpm/php.ini

EXPOSE 80

COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf
COPY start-container /usr/local/bin/start-container
RUN chmod +x /usr/local/bin/start-container

ENTRYPOINT ["start-container"]
