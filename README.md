# Installation

> To setup the project you must have Docker installed on your machine

## 1. Clone the repo
```bash
git clone https://github.com/MarouaneZizah/square1_technical_test.git
```

## 2. Build the Docker containers
```bash
docker-compose up -d --build
```

## 3. Install composer dependencies
```bash
docker-compose exec app composer install
```

## 4. Setup config file
```bash
docker-compose exec app cp .env.example .env
```

## 5. Generate key
```bash
docker-compose exec app php artisan key:generate
```

## 6. Create Database
```bash
docker exec db mysql -u root -psecret -e "create database blog"
```

>phpMyAdmin is accessible on [http://localhost:8081](http://localhost:8081) (username : root |  password :secret)


## 7. Setup .env file
```bash
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=blog
DB_USERNAME=root
DB_PASSWORD=secret

CACHE_DRIVER=redis

REDIS_HOST=redis
REDIS_PASSWORD=
REDIS_PORT=6379
```

## 8. Run migrations and seeds
```bash
docker-compose exec app php artisan migrate:refresh --seed
```

## 9. Install npm dependencies
```bash
docker exec app npm install
docker exec app npm run prod
```

>Now visit [http://localhost](http://localhost) to use the application

# Run scheduler
To import blog posts using the external blogging platform API, launch the Laravel scheduler using this command. It will automatically import new posts every hour.

```bash
docker exec app php artisan schedule:work
```

Or just launch this artisan command to test the functionality immediately without waiting every hour
```bash
php artisan post:import
```

# Tests

To run integration test, launch the following command
```bash
docker exec app php artisan test
```
