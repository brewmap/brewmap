## Development commands
### Environment
Run application:
```shell script
docker-compose up -d web php
```

### PHP
Run PHP (with command instead of `*`):
```shell script
docker-compose run -u "$(id -u):$(id -g)" php *
```

Like that:
```shell script
docker-compose run -u "$(id -u):$(id -g)" php -v
docker-compose run -u "$(id -u):$(id -g)" php ./vendor/bin/behat
```

Go into PHP container:
```shell script
docker exec -it -u "$(id -u):$(id -g)" brewmap-php sh
```

### Composer
Run Composer (with command instead of `*`):
```shell script
docker-compose run -u "$(id -u):$(id -g)" composer *
```

Like that:
```shell script
docker-compose run -u "$(id -u):$(id -g)" composer -V
docker-compose run -u "$(id -u):$(id -g)" composer show
docker-compose run -u "$(id -u):$(id -g)" composer dump-autoload
```

#### Services
You can run Psalm (for static code analysis), Behat (for tests) and ECS (for code style) via Composer:
```shell script
docker-compose run -w /application -u "$(id -u):$(id -g)" composer psalm
docker-compose run -w /application -u "$(id -u):$(id -g)" composer behat
docker-compose run -w /application -u "$(id -u):$(id -g)" composer ecs
```