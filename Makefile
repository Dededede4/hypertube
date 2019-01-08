all: build run

build:
	docker build --tag=hyperteub .

run:
	docker run -p 4242:80 -v $(CURDIR)/www:/var/www hyperteub