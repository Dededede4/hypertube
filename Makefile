all: build run

build:
	docker build --tag=hyperteub .

run:
	docker run -d --name hypertueub -p 4242:80 -v $(CURDIR)/www:/var/www hyperteub
	docker exec hypertueub /etc/init.d/php7.0-fpm start

re:
	docker kill hypertueub
	docker rm hypertueub

bash:
	docker exec -i -t hypertueub /bin/bash
