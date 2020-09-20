This is a simple url shortener written with Laravel & PHP.

For installation clone this repo, fill .env file with DB configuration & run:
```
composer install
php artisan migrate --seed
php artisan serve
```

The main form is on route / . There is a simple form with validation to create shortened Url.
If no expiration url provided it will expire in 10 days.
You can then login with given further credentials to see all created urls with their data in form of table:
```
nikita.kolotilo@gmail.com
qweqwe33
```

Why did I use Laravel? Because it gives convenient routing, schema builder, authentication system & validation tools out of the box & it's based on Symfony components.
I also created plain PHP object named DTO to move request data to my Service Layer without errors (its a good practice I believe).
