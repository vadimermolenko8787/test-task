up:
	docker-compose up -d --build

down:
	docker-compose down

test:
	docker-compose exec php vendor/bin/phpunit
