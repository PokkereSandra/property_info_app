Small data retrieve program, containing persons and properties. Possible to add, edit or delete people, properties or land ownerships. Open summary of all or check each of part. Persons are unique by personal code or registration number if it is company. Properties are unique by cadastral number. Not possible to add property if person is not added or register land if property is not set yet.

### Used technologies:
- PHP 8.0.19
- Laravel 9.30.1
- MariaDB 10.4.24

### To run program do steps below:
- clone project from github
- composer install
- fill .env file as in .env.example
- create database
- php artisan migrate
- php artisan db:seed (to add some fake persons with properties)
- php artisan key:generate
- php artisan serve
