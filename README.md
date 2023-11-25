# Install and Set Up Laravel with Docker Compose

Setting up Laravel in the local environment with Docker using the LEMP stack that includes: PostgreSQL, PHP(Laravel 10), and adminer.

## Why use Docker for Development

- [x] Consistent development environment for the entire team.
- [x] You don't need to install a bunch of language environments on your system.
- [x] You can use different versions of the same programming language.
- [x] Deployment is easy

## How to Install and Run the Project

1. ```git@github.com:HappyProgger/Laravel10_postgreSQL_adminer_restAPI.git```
2. ```cd src```
3. ```composer install```
3. Copy ```.env.example``` to ```.env```
4. ```docker-compose build```
5. ```docker compose up -d```
6. You can see the project on ```127.0.0.1:80```


## How to use PostgreSQL as a database

1. Uncomment the PostgreSQL configuration inside the ```docker-compose.yml``` including: ```db``` and ```pgamdin```
2. Copy ```.env.example``` to ```.env```
3. Change ```DB_HOST``` to ```localhost```
4. Change ```DB_CONNECTION``` to ```pgsql```
5. Change ```DB_PORT``` to ```5432```
6. Open the ```adminer``` on ```127.0.0.1:8080```
7. Exec comand in root Laravel ```php artisan migrate ```
8. Exec comand in root Laravel ```php artisan db:seed ```
10. Exec comand in root Laravel ```sail php artisan serve```
11. Test all methods of Resources_API in adress "http://127.0.0.1:8000/api/"
12. You can see all routes "sail php artisan route:list"

## How to run Laravel Commands with Docker Compose

1. ```cd src```
2. ```docker-compose exec app php artisan {your command}``` 

## Medium

https://medium.com/@hanieasemi/setting-up-a-laravel-local-environment-with-docker-7541ae170daf

## YouTube 

https://www.youtube.com/watch?v=6ANYowpB910

https://www.youtube.com/watch?v=gZfCAIGsz_o
