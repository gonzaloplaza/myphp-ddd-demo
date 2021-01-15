# MyPHP-DDD-Demo - Another Template for Well-designed Symfony API Projects

![nginx 1.16.1](https://img.shields.io/badge/nginx-1.16-brightgreen.svg)
![php 7.4](https://img.shields.io/badge/php-7.4-brightgreen.svg)
[![PHPStan](https://img.shields.io/badge/PHPStan-enabled-brightgreen.svg?style=flat)](https://phpstan.org/)
![GitHub Repo Size](https://img.shields.io/github/repo-size/gonzaloplaza/myphp-ddd-demo)
[![License MIT](https://img.shields.io/badge/license-MIT-blue.svg)](LICENSE)

------

- **Author**: Gonzalo Plaza <gonzalo@verize.com>
- **Version**: 0.0.1
- **Date**: January 2021

------

### Tech Stack

- PHP-FPM 7.4
- Symfony 5.2
- Monolog  
- Good practices: DDD (Domain Drive Design), Bounded contexts, SOLID principles... 
- Work in progress...

### Development quality/testing tools

- PHPStan (PHP Static Analysis)
- PHPMD (PHP Mess Detector)
- PHPUnit (testing framework for PHP)
- PHP-CS-Fixer (PHP Coding Standards Fixer)

-------

### Install

Install composer vendors

```
composer install
```

Copy ``.env`` to ```.env.local``` to override environment variables

### Run development

You'll need to install Symfony cli locally to run dev server (https://symfony.com/download)

```
composer dev
```
or
```
symfony server:start -d
```

Development endpoint is: http://127.0.0.1:8000

### Run quality tools checking (Static Analysis, Mess Detector...)

```
composer phpstan
composer phpmd
```

### Run tests (PHPUnit)

```
composer tests
```
or

```
php bin/phpunit
```

### Production steps

Build the image:

```
docker build -t myphp-ddd-demo .
```

Start the Docker container (passing env variables if exists):

```
docker run --rm -d -p 8086:8086 \
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
- Optimized to only use resources when there's traffic (by using PHP-FPM ondemand PM)
- The servers Nginx, PHP-FPM and supervisord run under a non-privileged user (nobody) to make it more secure
- The logs of all the services are redirected to the output of the Docker container (visible with `docker logs -f <container name>`)
- Follows the KISS principle (Keep It Simple, Stupid) to make it easy to understand and adjust the image to your needs

### Docker configuration

In [docker/](./etc/docker) you'll find the default configuration files for Nginx, PHP and PHP-FPM.
If you want to extend or customize that, you can do so by mounting a configuration file in the correct folder.
