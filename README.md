# Belajar Laravel 6
## Dibuat dengan Framework
 - (PHP) Laravel 6.* LTS
 - Laravel UI
	 ```
	 composer require laravel/ui:^1.0 --dev
	 ```
 - Laravel Collective
	 ```
	 composer require laravelcollective/html
	 ```
 - laravel-dompdf
 	 ```
 	 composer require barryvdh/laravel-dompdf
 	 ```
 - 

## Eloquent ORM
### Buat Model Factory Control 
php artisan make:model Flight --factory
php artisan make:model Flight -f

php artisan make:model Flight --seed
php artisan make:model Flight -s

php artisan make:model Flight --controller
php artisan make:model Flight -c

php artisan make:model Flight -mfsc

https://www.lab-informatika.com/membuat-dependent-dropdown-di-laravel