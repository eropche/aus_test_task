FROM php:8.0-fpm AS base

ARG FFMPEG_VERSION=4.4

RUN apt-get update \
    && echo "### Composer ###" 1>&2 \
    && curl -L -o - https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer \
    && echo "### Project Composer dependencies ###" 1>&2 \
    && apt-get install -y \
        git \
        unzip \
    && echo "### Rsync for CI ###" 1>&2 \
    && apt-get install -y \
        rsync \
    && echo "### PHP configuration ###" 1>&2 \
    && echo "### Packages ###" 1>&2 \
    && apt-get install -y \
        sudo \
        procps \
        libfcgi0ldbl \
        redis-tools \
    && echo "### Supervisor ###" 1>&2 \
    && apt-get install -y \
        supervisor \
    && echo "### Project dependencies ###" 1>&2 \
    && docker-php-ext-install \
        opcache \
        bcmath \
        sockets \
    && apt-get install -y \
        libpq-dev \
    && docker-php-ext-install \
        pdo_pgsql \
    && apt-get install -y \
        libicu-dev \
    && docker-php-ext-install \
        intl \
    && apt-get install -y \
        libxml2-dev \
    && docker-php-ext-install \
        soap \
    && apt-get install -y \
        libzip-dev \
    && docker-php-ext-install \
        zip \
    && apt-get install -y \
        librabbitmq-dev \
    && pecl install \
        https://pecl.php.net/get/amqp-1.11.0beta.tgz \
    && docker-php-ext-enable \
        amqp \
    && apt-get install -y \
        libmagickwand-dev \
    && pecl install \
        imagick \
    && docker-php-ext-enable \
        imagick \
    && rm -rf \
        /tmp/pear \
    && echo "### FFmpeg ###" 1>&2 \
    && curl -L -o - https://www.johnvansickle.com/ffmpeg/releases/ffmpeg-${FFMPEG_VERSION}-amd64-static.tar.xz \
    | tar -xJ -f - --strip-components=1 --directory=/usr/local/bin ffmpeg-${FFMPEG_VERSION}-amd64-static/ffmpeg ffmpeg-${FFMPEG_VERSION}-amd64-static/ffprobe \
    && echo "### Xdebug ###" 1>&2 \
    && pecl install xdebug \
    && rm -rf \
        /tmp/pear \
    && echo "### cron ###" 1>&2 \
    && apt-get install -y \
        cron \
    && :> /etc/crontab \
    && rm -rf \
        /etc/cron.d/* \
    && echo "### Directories ###" 1>&2 \
    && mkdir -p \
        /var/www \
        /var/www/.postgresql \
        /project \
        /project/var/cache \
    && chown -R www-data:www-data \
        /var/www \
        /project \
    && echo "### Installing CA certificates ###" 1>&2 \
    && curl -L -o /var/www/.postgresql/root.crt https://storage.yandexcloud.net/cloud-certs/CA.pem \
    && chown www-data:www-data /var/www/.postgresql/root.crt \
    && chmod 0600 /var/www/.postgresql/root.crt \
    && echo "### Cleanup ###" 1>&2 \
    && rm -rf \
        /var/lib/apt/lists/*

WORKDIR /project
EXPOSE 9000