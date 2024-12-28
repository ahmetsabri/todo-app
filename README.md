## Todo App

# Installation:

`composer install`

`cp .env.example .env`

`php artisan key:gen`

# Database:
### Note: This app uses SQLite by default, but you can customize the database configuration in the .env

`php artisan migrate --seed`

(This will create the necessary tables and seed the providers and developers data.)

# Usage

- Fetch Tasks: `php artisan app:fetch-tasks`
- Assign Tasks to developers: `php artisan app:assign-tasks`
- Add New provider: `php artisan app:add-provider`
# Final Result:
Start the application:
`php artisan serve`

You can access the app at:
http://127.0.0.1:8000
