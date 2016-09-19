#  AM Transparency Portal
An open government transparency demo application built with Laravel Framework.

## Demo
[Live demo](https://portal-transparencia.herokuapp.com/) running with Heroku.

## Feature List
* Fast and friendly quick search and advanced search features
* Add/Edit/Remove (users and expenses)
* Upload/Download file
* User role based access (admin, employee)
* Admin interface to create employees
* User admin panel
* Lost password feature (e-mail confirmation routine)

## Technology Stack
*Server-side:*
* Laravel Framework 5.2
  * Migrations, Queues, Mail, FileStorage, Cache, etc.
* Restful API
* MySQL Database

*Client-side:*
* Single Page Application (AngularJS 1.x)
* Webpack
* Bower
* bootstrap 3.x, jasny-bootstrap, font-awesome, etc.

## How to run this application
### Setting the database
Create the database
```
CREATE DATABASE pam
```
Import the dump.sql file
```
 mysql -u <user name> -p<password> pam < dump.sql
```

### Running locally
Open the command line and copy the following commands bellow:
```
git clone https://github.com/erickbogarin/transparency-portal.git
cd transparency-portal
composer update
php artisan serve
```
Go to localhost:8000/ to see the app

## Notes
[Configure the SMTP Host Address](https://github.com/erickbogarin/transparency-portal/blob/master/config/mail.php) (Optional)

The Token-Based Authentication (jwt-auth) was implemented but I decided to not use it for now. Feel free to adapt it to this project.

## Laravel Docs
https://laravel.com/docs/5.2/releases


