FROM alpine:3

LABEL Maintainer="Gonzalo Plaza <gonzalo@verize.com>" \
      Description="Lightweight container with PHP-FPM 7.4 based on Alpine 3.12 Linux"

ARG PORT=9000

ENV PORT=$PORT
ENV APP_ENV=dev
ENV APP_DEBUG=1

# Install packages
# Adds support for PHP7.4.*
ADD https://dl.bintray.com/php-alpine/key/php-alpine.rsa.pub /etc/apk/keys/php-alpine.rsa.pub

RUN apk --update-cache add ca-certificates && \
    echo "https://dl.bintray.com/php-alpine/v3.12/php-7.4" >> /etc/apk/repositories

RUN apk --no-cache add php php-fpm php-dom php-openssl php-curl \
  php-zlib php-xml php-phar php-iconv php-intl php-ctype php-session \
  php-mbstring php-gd php-json php-xdebug php-amqp supervisor fcgi curl \
  && ln -s /usr/bin/php7 /usr/bin/php

# Check PHP, Composer versions
RUN php -v
RUN php -m

# Configure PHP-FPM
COPY ./etc/php-fpm/fpm-pool.conf /etc/php7/php-fpm.d/www.conf
COPY ./etc/php-fpm/php.ini /etc/php7/conf.d/custom.ini

# Install php-fpm-healthcheck tool (https://github.com/renatomefi/php-fpm-healthcheck)
RUN wget -O /usr/local/bin/php-fpm-healthcheck \
  https://raw.githubusercontent.com/renatomefi/php-fpm-healthcheck/master/php-fpm-healthcheck \
  && chmod +x /usr/local/bin/php-fpm-healthcheck

# Configure supervisord
COPY ./etc/supervisor/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Setup document root
RUN mkdir -p /var/www/html

# Make sure files/folders needed by the processes are accessable when they run under the nobody user
RUN chown -R nobody.nobody /var/www/html && \
  chown -R nobody.nobody /run

# Add application
WORKDIR /var/www/html
COPY --chown=nobody . /var/www/html/

# Install dependencies
RUN curl -s https://getcomposer.org/installer | php \
    && chown -hR nobody:nobody ./composer.phar \
    && php ./composer.phar --version \
    && php ./composer.phar install --no-scripts --optimize-autoloader --no-interaction --no-progress \
    && chown -hR nobody:nobody ./vendor && ls -la ./vendor

# Switch to use a non-root user from here on
USER nobody

# Clear cache && show about
RUN php ./bin/console cache:clear && php ./bin/console about

# Expose the port php-fpm is reachable on
EXPOSE $PORT

# Let supervisord start php-fpm and nginx
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]

# Configure a healthcheck to validate that php-fpm pool is up&running
HEALTHCHECK --interval=60s --timeout=10s CMD php-fpm-healthcheck || exit 1