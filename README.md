## Slim Api

[![Latest Stable Version](https://poser.pugx.org/jyil/slim-api/v/stable)](https://packagist.org/packages/jyil/slim-api)
[![Total Downloads](https://poser.pugx.org/jyil/slim-api/downloads)](https://packagist.org/packages/jyil/slim-api)
[![License](https://poser.pugx.org/jyil/slim-api/license)](https://packagist.org/packages/jyil/slim-api)

## QUICK START
	composer install
	cp configurations/settings-development.yml configurations/settings.yml
	docker-compose up -d

## Phpunit
	./vendor/bin/phpunit

## Browse
	ip:8080
	
## Swagger
    ./vendor/bin/openapi src -o public --format json
    
    ip:8890
    API_URL: ip:8890/api/swagger
    
## [Doctrine Migrations](https://www.doctrine-project.org/projects/doctrine-migrations/en/2.0/index.html)
    ./vendor/bin/doctrine-migrations generate
    ./vendor/bin/doctrine-migrations migrations:migrate 

## TODO
- [x] Jwt
- [x] Eloquent
- [x] Swagger
- [x] Doctrine Migrations
- [x] socialite(wechat, ....)
- [x] predis
- [x] [token bucket](https://github.com/bandwidth-throttle/token-bucket)
