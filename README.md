## To get started

Run composer install and npm install on your cmd or terminal

Copy .env.example file to .env on the root folder (terminal - cp .env.example .env).

Open your .env file and change the database name (DB_DATABASE) to whatever you have, username 
(DB_USERNAME) and password (DB_PASSWORD) field correspond to your configuration.

By default, the username is root and you can leave the password field empty. (This is for Xampp)

Run php artisan key:generate

Run php artisan migrate

Run php artisan serve 

Go to localhost:8000