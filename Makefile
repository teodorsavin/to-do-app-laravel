.RECIPEPREFIX +=
.DEFAULT_GOAL := help

.PHONY: help
help:
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}'

.PHONY: install
install: ## Runs composer install, and sail up (docker-compose up), migrations and user seeder
	cp .unimportantenv .env \
	composer install \
	./vendor/bin/sail up -d \
	sleep 10 \ ## A reminder to drink some water and wait in order for docker to come up
	./vendor/bin/sail artisan migrate \
	./vendor/bin/sail artisan db:seed --class=UserSeeder

.PHONY: serve
serve: ## Runs sail up (docker-compose up)
	./vendor/bin/sail up -d

.PHONY: composer
composer: ## Runs composer install
	composer install
