start:
	php artisan serve --host 0.0.0.0

setup:
	composer install
	cp -n .env.example .env|| true
	php artisan key:gen --ansi
	touch database/database.sqlite||true
	php artisan migrate
	php artisan db:seed --class=ProductsTableSeeder
	php artisan db:seed --class=ProductImagesTableSeeder

migrate:
	php artisan migrate

log:
	tail -f storage/logs/laravel.log

test:
	php artisan test

test-coverage:
	composer phpunit tests -- --coverage-clover build/logs/clover.xml

lint:
	composer phpcs

lint-fix:
	composer phpcbf

