FROM alpine:3.13.5

LABEL Maintainer="Gonzalo Plaza <gonzalo@verize.com>" \
      Description="Lightweight container with Nginx 1.16 & PHP-FPM 7.4 based on Alpine Linux"

ARG PORT=8600

ENV PORT=$PORT
ENV APP_ENV=dev
ENV APP_DEBUG=1

# Install packages
# Add support for PHP7.4.*
ADD https://dl.bintray.com/php-alpine/key/php-alpine.rsa.pub /etc/apk/keys/php-alpine.rsa.pub

RUN apk --update-cache add ca-certificates && \
    echo "https://dl.bintray.com/php-alpine/v3.12/php-7.4" >> /etc/apk/repositories

RUN apk --no-cache add php php-fpm php-dom php-openssl php-curl \
  php-zlib php-xml php-phar php-iconv php-intl php-ctype php-session \
  php-mbstring php-gd php-json nginx supervisor curl \
  && ln -s /usr/bin/php7 /usr/bin/php

# Check PHP, Composer versions
RUN php -v
RUN php -m

# Configure nginx
COPY ./etc/docker/nginx.conf /etc/nginx/nginx.conf
# Remove default server definition
RUN rm /etc/nginx/conf.d/default.conf

# Configure PHP-FPM
COPY ./etc/docker/fpm-pool.conf /etc/php7/php-fpm.d/app.conf
COPY ./etc/docker/php.ini /etc/php7/conf.d/custom.ini

# Configure supervisord
COPY ./etc/docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Setup document root
RUN mkdir -p /var/www/html

# Make sure files/folders needed by the processes are accessable when they run under the nobody user
RUN chown -R nobody.nobody /var/www/html && \
  chown -R nobody.nobody /run && \
  chown -R nobody.nobody /var/lib/nginx && \
  chown -R nobody.nobody /var/log/nginx

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

# Expose the port nginx is reachable on
EXPOSE $PORT

# Let supervisord start nginx & php-fpm
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]

# Configure a healthcheck to validate that everything is up&running
HEALTHCHECK --interval=60s --timeout=10s CMD curl --silent --fail http://127.0.0.1:$PORT/fpm-ping