# Form request in laravel (8) 

## Installation

Use composer i


## Commands used

```bash
composer create-project laravel/laravel form_request

cd  form_request


php artisan make:controller UserController --api

php artisan make:request UserRequest

php artisan make:model Post 

php artisan make:controller PosController --api

php artisan make:request Post/StorePostRequest

php artisan make:request Post/UpdatePostRequest


mkdir app/Http/Request/User

mv app/Http/Request/UserRequest app/Http/Request/User/
```

