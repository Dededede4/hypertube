all: build run

build:
	docker build --tag=hyperteub .

install: 
	make build
	docker run --rm --interactive --tty \
	--volume $(PWD)/www:/app \
	--user $(id -u):$(id -g) \
	composer install --ignore-platform-reqs # php7.3-bcmath no detected ?
	make run
	docker exec hypertueub bash -c "cd /var/www/front && npm i && npm run build &&  node html_to_twig /var/www/front/build/index.html > /var/www/templates/base.html.twig && rm -rf /var/www/public/react &&  mv /var/www/front/build /var/www/public/react ;"
	docker exec hypertueub bash -c "cd /var/www/downloadeur/ && npm i"
	docker exec hypertueub php /var/www/bin/console doctrine:database:create
	docker exec hypertueub php /var/www/bin/console doctrine:schema:update --force
	# Just for somes days of dev
	docker exec hypertueub chmod 666 /tmp/bdd.sqlite

run:
	docker run -d --name hypertueub -p 4242:80 -v $(CURDIR)/www:/var/www hyperteub
	docker exec hypertueub /etc/init.d/php7.3-fpm start
	docker exec hypertueub service rabbitmq-server start
	docker exec hypertueub bin/console doctrine:migrations:migrate
	docker exec hypertueub service downloader start

clean:
	-docker kill hypertueub
	-docker rm hypertueub

re: clean all

bash:
	docker exec -i -t hypertueub /bin/bash
