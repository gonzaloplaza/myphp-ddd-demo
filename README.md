# MyPHP-DDD-Demo - Another Template for Well-designed Symfony API Projects

![php 7.4](https://img.shields.io/badge/php-7.4-brightgreen.svg?style=flat)
[![Symfony 5.2.*](https://img.shields.io/badge/Symfony-5.2.*-brightgreen.svg?style=flat)](https://symfony.com)
![GitHub Repo Size](https://img.shields.io/github/repo-size/gonzaloplaza/myphp-ddd-demo)
[![Github CI](https://github.com/gonzaloplaza/myphp-ddd-demo/workflows/ci/badge.svg)](https://github.com/gonzaloplaza/myphp-ddd-demo/actions)
[![codecov](https://codecov.io/gh/gonzaloplaza/myphp-ddd-demo/branch/master/graph/badge.svg?token=ELT3HK2YL1)](https://codecov.io/gh/gonzaloplaza/myphp-ddd-demo)
[![Known Vulnerabilities](https://snyk.io/test/github/gonzaloplaza/myphp-ddd-demo/badge.svg?targetFile=composer.lock)](https://snyk.io/test/github/gonzaloplaza/myphp-ddd-demo?targetFile=composer.lock)
[![License MIT](https://img.shields.io/badge/license-MIT-blue.svg)](LICENSE)

------

This is a PHP7.4 - Symfony 5 boilerplate/example for JSON REST APIs, backend services,
microservices or console/terminal applications. It's focused on simplicity, decoupling from infrastructure 
(Hexagonal Architecture) and Domain Driven Development. 

Ideas and Feature Requests are welcomed!

------

### Tech Stack

- PHP-FPM 7.4
- Symfony 5.2.*
- Docker (Alpine, nginx, php-fpm, supervisord ...)
- Good practices: DDD (Domain Drive Design), Bounded Contexts, SOLID principles, TDD&BDD... 
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
file and Mink Extension.

```
$ composer tests
```
or separately

```
$ composer behat
$ composer phpunit
```

### Production steps

Build the image:

```
$ docker build -t myphp-ddd-demo .
```

Start the Docker container (passing env variables if exists):

```
$ docker run --rm -d -p 8086:8086 \
    --name myphp-ddd-demo myphp-ddd-demo
```

Container endpoint is running: http://localhost:8086

### Docker container Description

Example PHP-FPM 7.4 & Nginx 1.16 setup for Docker, build on [Alpine Linux](http://www.alpinelinux.org/).
The image is only +/- 35 MB large.

- Built on the lightweight and secure Alpine Linux distribution
- Very small Docker image size (+/-35 MB)
- Uses PHP 7.4
- Optimized for 100 concurrent users
- Optimized to only use resources when there's traffic (by using PHP-FPM's on-demand PM)
- The servers Nginx, PHP-FPM and supervisord run under a non-privileged user (nobody) to make it more secure
- The logs of all the services are redirected to the output of the Docker container (visible with 
  `docker logs -f <container name>`)
- Follows the KISS principle (Keep It Simple, Stupid) to make it easy to understand and adjust the image to your needs

### Docker configuration

In [etc/docker/](./etc/docker) you can find default configuration files for Nginx, PHP, PHP-FPM and Supervisord.
If you want to extend or customize that, you can do so by mounting a configuration file in the correct folder.
