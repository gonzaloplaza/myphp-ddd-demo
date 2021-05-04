.PHONY: all start stop down rebuild test

current-dir := $(dir $(abspath $(lastword $(MAKEFILE_LIST))))

# Docker
start:
	@docker-compose up -d

stop:
	@docker-compose stop

down:
	@docker-compose down

rebuild:
	@docker-compose build --parallel --pull --force-rm --no-cache
	@make start

# Composer
test:
	@composer test