all: build run

build:
	docker build --tag=hyperteub .

install: build
	docker run --rm --interactive --tty \
    --volume $PWD:/app \
    --user $(id -u):$(id -g) \
    composer install


run:
	docker run -d --name hypertueub -p 4242:80 -v $(CURDIR)/www:/var/www hyperteub
	docker exec hypertueub /etc/init.d/php7.3-fpm start

clean:
	docker kill hypertueub
	docker rm hypertueub

re: clean all

bash:
	docker exec -i -t hypertueub /bin/bash
