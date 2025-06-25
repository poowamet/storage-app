<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

# ขั้นตอนการติดตั้งและรัน
## 1. Clone โปรเจกต์
git clone https://github.com/poowamet/storage-app.git

cd storage-app

## 2. ติดตั้งแพ็กเกจด้วย Composer
composer install

## 3. คัดลอกไฟล์ .env และตั้งค่าการเชื่อมต่อฐานข้อมูล
cp .env.example .env

จากนั้นเปิดไฟล์ .env และแก้ไขค่าต่อไปนี้ให้ตรงกับการตั้งค่าฐานข้อมูลของคุณ

- DB_CONNECTION=mysql
- DB_HOST=127.0.0.1
- DB_PORT=3306
- DB_DATABASE=ชื่อฐานข้อมูล
- DB_USERNAME=ชื่อผู้ใช้ฐานข้อมูล
- DB_PASSWORD=รหัสผ่านของฐานข้อมูล

## 4. สร้าง application key
php artisan key:generate

## 5. รันคำสั่ง Migrate เพื่อสร้างตารางในฐานข้อมูล
php artisan migrate

## 6. เริ่มต้นเซิร์ฟเวอร์ Laravel
php artisan serve

จากนั้นสามารถเปิดเบราว์เซอร์และเข้าใช้งานได้ที่: http://localhost:8000
