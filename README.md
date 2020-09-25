# Lumen PHP Framework (7.2.2) (Laravel Components ^7.0)

## Module Developed

- User Registration
- User Login
- Get Users List
- Get User By Id
- Get Current User Profile

## Installation and Usage

-   `git clone https://github.com/lpkapil/lumenapp.git`
-   `cd lumenapp`
-   `composer install`
-   `Edit .env file and update JWT_SECRET value`
-   `php artisan migrate`
-   `php -S localhost:8000 -t public`

## API Official Documentation

<h4>Get all users</h4>

Method: GET
URL: localhost:8000/api/users
Headers: 

Authroization

<h4>Get current user profile<h4>

Method: GET
URL: localhost:8000/api/profile

<h4>Get User By Id</h4>

Method: GET
URL: localhost:8000/api/users/{id}

<h4>Login User and Get Authorization Token</h4>

Method: POST
URL: localhost:8000/api/login
params:

email, password

<h4>Register User</h4>

Method: POST
URL: localhost:8000/api/register
params:

name,email,password,password_confirmation
