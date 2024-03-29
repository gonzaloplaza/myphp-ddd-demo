# MyPHP-DDD-Demo - Another Boilerplate for DDD Symfony API Projects

![php 7.4](https://img.shields.io/badge/php-7.4-brightgreen.svg?style=flat)
[![Symfony 5.2.*](https://img.shields.io/badge/Symfony-5.2.*-brightgreen.svg?style=flat)](https://symfony.com)
![GitHub Repo Size](https://img.shields.io/github/repo-size/gonzaloplaza/myphp-ddd-demo)
[![Github CI](https://github.com/gonzaloplaza/myphp-ddd-demo/workflows/ci/badge.svg)](https://github.com/gonzaloplaza/myphp-ddd-demo/actions)
[![codecov](https://codecov.io/gh/gonzaloplaza/myphp-ddd-demo/branch/master/graph/badge.svg?token=ELT3HK2YL1)](https://codecov.io/gh/gonzaloplaza/myphp-ddd-demo)
[![License MIT](https://img.shields.io/badge/license-MIT-blue.svg)](LICENSE)

------

This is a PHP7.4 - Symfony 5 boilerplate/example for JSON REST APIs, backend services,
microservices or console/terminal applications. It's focused on simplicity, decoupling from infrastructure 
(Hexagonal Architecture) and Domain Driven Design. 

Ideas and Feature Requests are welcomed!

------

### Tech Stack

- PHP-FPM 7.4
- Symfony 5.2.*
- Docker & Docker Compose (Alpine, NGINX, php-fpm, supervisord ...)
- Rabbitmq/AMQP integration with Symfony Messenger component  
- Good practices: DDD (Domain Driven Design), Bounded Contexts, SOLID principles, TDD&BDD... 
- Work in progress...

### Development quality/testing tools

- PHPStan (PHP Static Analysis)
- PHPMD (PHP Mess Detector)
- PHP-CS-Fixer (PHP Coding Standards Fixer)

- PHPUnit (Testing framework for PHP)
- Behat (Behavior-Driven Development framework)

- [Codecov.io](https://codecov.io/gh/gonzaloplaza/myphp-ddd-demo) Integration (Code coverage)

-------

### Install

Install composer vendors

```
$ composer install
```

Copy ``.env`` to ``.env.local`` to override environment variables

### Run development

You have to install **Symfony CLI** locally to run dev server (https://symfony.com/download)

```
$ composer dev
```
or
```
$ symfony server:start -d
```

Development endpoint is: http://127.0.0.1:8000

HealtCheck Endpoint is: http://127.0.0.1:8000/health_check

### Run quality tools checking (Static Analysis, Mess Detector...)

```
$ composer phpstan
$ composer phpmd
```

### Run tests (Behat & PHPUnit)

Note: Starting local server is not needed to run tests (including e2e api tests) due
to Symfony application bootstraping in ```tests/src/bootstrap.php```
file and Mink Extension. This is fine to work with CI tools such as Github Actions or Jenkins pipelines.

```
$ composer tests
```
or separately

```
$ composer behat
$ composer phpunit
```

### Working with Docker Compose for development (recommended):

You can build and run locally the application stack with Docker Compose (php-fpm app + nginx + rabbitmq).
A shared volume between code and containers will be created (Check [docker-compose.yaml](./docker-compose.yaml)).

```
$ docker-compose build
$ docker-compose up -d
```

You can stop the stack and remove containers:
```
$ docker-compose down
```

The application endpoint is running at: http://localhost:8081


### RabbitMQ access and configuration (Docker Compose)

If you are using Docker Compose runtime during development, be sure you have created the following environment
variables:


```
#.env file
AMPQ_TRANSPORT_DSN=amqp://user:password@myphp-ddd-demo-rabbitmq:5672/%2f/messages
DOCKER_RABBITMQ_DEFAULT_USER=user
DOCKER_RABBITMQ_DEFAULT_PASS=password
```


Once Rabbitmq cluster is created and running, run this command to start the async message consumer (We use Symfony Messenger 
implementation): https://symfony.com/doc/current/messenger.html#transports-async-queued-messages

```
# Start listening messages (consumer)
$ docker exec -it myphp-ddd-demo php bin/console messenger:consume async

# Stop consumer
$ docker exec -it myphp-ddd-demo php bin/console messenger:stop
```


Also, you can access the RabbitMQ's management UI through: http://localhost:15672 using the provided credentials.



### Standalone Docker container

If you want to build the standalone application container (running php-fpm on port 9000/tcp).

Note: you will need a fast-cgi proxy like Apache or NGINX (https://symfony.com/doc/current/setup/web_server_configuration.html)

```
$ docker build -t myphp-ddd-demo .

$ docker run --rm -d -p 9000:9000 \
    --name myphp-ddd-demo myphp-ddd-demo
```


### Docker, infrastructure stack configuration

In [etc/](./etc/) you can find default configuration files for php7.4, php-fpm, nginx, rabbitmq and supervisor.
If you want to extend or customize that, you can do so by mounting a configuration file in the correct folder.

### Next Steps

- [x] Adds DDD/Hexagonal architecture with shared bounded context
- [x] Adds Github CI + CI testings
- [x] Docker for local development (Docker Compose)
- [x] RabbitMQ, Symfony Messenger, DDD-integration  
- [ ] Better documentation
- [x] AWS CodeBuild yaml specification (buildspec)
- [ ] Kubernetes manifests.
