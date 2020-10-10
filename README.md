<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Run Project Laravel dari Github

1. Download source code dari github
2. Ekstrak folder zip ke direktori xampp/htdocs
3. Install composer dengan cara buka cmd, arahkan ke direktori xampp/htdocs/namaprojectlaravel, kemudian ketikkan perintah composer install
4. Setup database dengan cara copy file example.env, lalu rename file .env dan isikan database. 
5. Kemudian buat database di phpmyadmin sesuai dengan nama database pada file .env yang sudah dibuat
5. php artisan migrate
6. php artisan key:generate
7. run project dengan cara php artisan serve atau php -S localhost:8000 -t public