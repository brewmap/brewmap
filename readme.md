## Installation & development
Create `.env` file based on `.env.example`:
```shell script
cp .env.example .env
```

Run containers:
```shell script
CURRENT_UID=$(id -u):$(id -g) docker-compose up -d --build
```

Fetch dependencies:
```shell script
composer install
npm install
```

Generate application key:
```shell script
php artisan key:generate
```

Generate assets:
```shell script
php artisan nova:publish
php artisan telescope:publish
npm run dev
```

## Development commands
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
docker-compose run -u "$(id -u):$(id -g)" php composer *
```

Like that:
```shell script
docker-compose run -u "$(id -u):$(id -g)" php composer -V
docker-compose run -u "$(id -u):$(id -g)" php composer show
docker-compose run -u "$(id -u):$(id -g)" php composer dump-autoload
```

#### Services
You can run Psalm (for static code analysis), Behat (for tests) and ECS (for code style) via Composer:
```shell script
docker-compose run -w /application -u "$(id -u):$(id -g)" php composer psalm
docker-compose run -w /application -u "$(id -u):$(id -g)" php composer behat
docker-compose run -w /application -u "$(id -u):$(id -g)" php composer ecs
```

### Node
Run Node (with command instead of `*`):
```shell script
docker-compose run -u "$(id -u):$(id -g)" node *
```

Like that:
```shell script
docker-compose run -u "$(id -u):$(id -g)" node npm -v
docker-compose run -u "$(id -u):$(id -g)" node npm install
```

Go into Node container:
```shell script
docker exec -it -u "$(id -u):$(id -g)" brewmap-node sh
```
