## Development commands
### Envirnoment
Run application:
```shell script
docker-compose up -d web php
```

### PHP
Run PHP (with command instead of `*`):
```shell script
docker-compose run -w /application -u "$(id -u):$(id -g)" php *
```

Like that:
```shell script
docker-compose run -w /application -u "$(id -u):$(id -g)" php -v
docker-compose run -w /application -u "$(id -u):$(id -g)" php ./vendor/bin/behat
```

Go into PHP container:
```shell script
docker exec -it -w /application -u "$(id -u):$(id -g)" brewmap-php sh
```

### Composer
Run Composer (with command instead of `*`):
```shell script
docker-compose run -w /application -u "$(id -u):$(id -g)" composer *
```

Like that:
```shell script
docker-compose run -w /application -u "$(id -u):$(id -g)" composer -V
docker-compose run -w /application -u "$(id -u):$(id -g)" composer show
docker-compose run -w /application -u "$(id -u):$(id -g)" composer dump-autoload
```