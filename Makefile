build:
	docker-compose build app

build-without-cache:
	docker-compose build --no-cache app

dev:
	docker-compose run --rm --service-ports app dev

test:
	docker-compose run --rm app test

logs:
	docker-compose logs -f app

clean:
	docker-compose stop
	docker-compose kill
	docker-compose down -v

shell:
	docker-compose run --rm app shell

migrate:
	docker-compose run --rm app migrate
