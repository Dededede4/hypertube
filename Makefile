all: build run

build:
	docker build --tag=hyperteub .

run:
	docker run -p 4242:80 -v /Users/user/hypertube/www:/var/www hyperteub