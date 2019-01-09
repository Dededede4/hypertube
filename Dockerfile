FROM debian:stretch

RUN apt-get update \
    && apt-get install -y \
        nginx \
	php-fpm \
	postgresql postgresql-client \
	curl

EXPOSE 80
EXPOSE 443

COPY ./config/nginx /etc/nginx/sites-available/default

CMD ["nginx", "-g", "daemon off;"]
