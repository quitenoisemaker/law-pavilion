> ### Law firm X.

# Getting started

## Installation

Clone the repository

    git clone https://github.com/quitenoisemaker/law-pavilion.git

Switch to the repo folder

    cd law-pavilion

Install all the dependencies using composer

    composer install

Copy the .env.example file and rename it to .env. Then make the neccessary changes

    Example:   
                DB_DATABASE=YOUR-DATABASE_NAME
                DB_USERNAME=YOUR_DATABASE-USERNAME
                DB_PASSWORD=YOUR_DATABASE-PASSWORD

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000


## Send mail to client without a profile image
    php artisan send:image-reminder

## Note
Run queue to send notifications and also configure Laravel’s email services via your application’s config/mail.php configuration file.

     php artisan queue:work

## Folders

- `app\Service\Client` - Contains the logic
- `app/Models` - Contains all the Eloquent models
- `app/Http/Controllers` - Contains all the web controllers
- `app/Http/Requests` - Contains all the web form requests
- `config` - Contains all the application configuration files
- `database/migrations` - Contains all the database migrations
- `routes/web` - Contains all the web routes


