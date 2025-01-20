FROM php:8.0-fpm-alpine

# Install PHP extensions
ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

RUN chmod +x /usr/local/bin/install-php-extensions && \
    install-php-extensions bcmath calendar exif gd gettext intl mysqli pdo_mysql opcache xdebug-^3.1

# Add configuration
ADD ./.docker/php/www.conf /usr/local/etc/php-fpm.d/www.conf

# Create Wordpress directory
RUN addgroup -g 1000 wp && adduser -G wp -g wp -s /bin/sh -D wp
RUN mkdir -p /var/www/html
RUN chown wp:wp /var/www/html

# Install WP CLI
ADD https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar /usr/local/bin/wp
RUN chmod +rx /usr/local/bin/wp


ADD ./.docker/php/entrypoint.sh /entrypoint.sh
RUN chmod +rx /entrypoint.sh
ENTRYPOINT [ "/entrypoint.sh" ]
USER 1000:1000
WORKDIR /var/www/html
