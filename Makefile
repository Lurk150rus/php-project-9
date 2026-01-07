#Makefile

start:
	php artisan serve

test:
	php artisan test

lint:
	composer exec --verbose phpcs -- app app
	composer exec --verbose phpstan

lint-fix:
	composer exec --verbose phpcbf -- app app

stan-lint:
	composer exec -v phpstan analyse -- -c phpstan.neon --ansi app
