up:
	docker-compose up -d

down:
	docker-compose down

install:
	docker-compose exec php composer install

test:
	docker-compose exec php vendor/bin/phpunit
