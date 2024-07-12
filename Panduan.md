Install Laravel
    composer create-project laravel/laravel example-app

Menggunakan "Laravel Sanctum" Untuk Membuat API Tokennya
    https://laravel.com/docs/11.x/sanctum#main-content
    - Install API
        php artisan install:api
    - Tambahkan di app/Models/User
        HasApiTokens
    - Buat Controller
        php artisan make:controller AuthController


Untuk Hit APInya Harus Login Terlebih Dahulu
