all: build run

build:
	docker build --tag=hyperteub .

install: all
	docker run --rm --interactive --tty \
	--volume $(PWD)/www:/app \
	--user $(id -u):$(id -g) \
	composer install
	docker exec hypertueub php /var/www/bin/console doctrine:database:create
	docker exec hypertueub php /var/www/bin/console doctrine:schema:update --force

run:
	docker run -d --name hypertueub -p 4242:80 -v $(CURDIR)/www:/var/www hyperteub
	docker exec hypertueub /etc/init.d/php7.3-fpm start

clean:
	docker kill hypertueub
	docker rm hypertueub

re: clean all

bash:
	docker exec -i -t hypertueub /bin/bash
