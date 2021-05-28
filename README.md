для установки нужно:
- запустить docker-compose up -d --build в корне проекта
- docker exec -it laravel-php composer install
- docker exec -it laravel-php php artisan migrate
- docker exec -it laravel-php php artisan passport:install

маршруты:

1. http://localhost/api/login

headers:
-  Accept application/json
-  Content-Type application/json

request body:
-  {
    "email": "user@email.com",
    "password": "11111111"
  }

сохранить токен из поля token ответа и подставлять для маршрутов валют в заголовок Authorization значения Bearer . $token
2. http://localhost/api/currencies?page=$pageNumber

headers:
-  Accept application/json
-  Content-Type application/json 
- Authorization Bearer . $token
   
3. http://localhost/api/currency/$code

headers:
-  Accept application/json
-  Content-Type application/json 
-  Authorization Bearer . $token

для выполнения команды обновления валют нужно выполнить docker exec -it laravel-php php artisan cur:upd

