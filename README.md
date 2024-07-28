# Laravel Project - Tabish

## Setup Instructions

1. Clone the repository:
   ```sh
   git clone https://github.com/tabish075/laravel-tabish.git
Navigate to the project directory:

sh
Copy code
cd your-repo-name
Install dependencies:

sh
Copy code
composer install
npm install
Copy the .env.example file to .env:

sh
Copy code
cp .env.example .env
Generate application key:

sh
Copy code
php artisan key:generate
Set up your database in the .env file.

Run migrations:

sh
Copy code
php artisan migrate
Start the development server:

sh
Copy code
php artisan serve
Usage
Register a new user via the /api/register endpoint.
Login via the /api/login endpoint.
Use the obtained token to access other endpoints.
