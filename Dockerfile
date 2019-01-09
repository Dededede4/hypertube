FROM debian:stretch

RUN apt-get update \
    && apt-get install -y \
        nginx \
	php-fpm \
	postgresql postgresql-client \
	curl \
	git \
	php-xml

EXPOSE 80
EXPOSE 443

COPY ./config/nginx /etc/nginx/sites-available/default

# Install symfony

RUN curl -sS https://get.symfony.com/cli/installer | bash
RUN mv /root/.symfony/bin/symfony /usr/local/bin/symfony

# Install composer

WORKDIR /tmp
RUN curl --silent --show-error https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer

CMD ["nginx", "-g", "daemon off;"]

WORKDIR /var/www
