- Setting .env
- atur Database sesuai dengan configrasi anda
- atur value env
menjadi : 
BROADCAST_DRIVER=pusher
QUEUE_CONNECTION=database
PUSHER_APP_ID=1143278
PUSHER_APP_KEY=1a29fcea6ab9cceb4491
PUSHER_APP_SECRET=a84920432eeb35cd3c14
PUSHER_APP_CLUSTER=ap1

- Tambahkan Library Pusher
composer require pusher/pusher-php-server "~3.0" 
atau
composer require pusher/pusher-php-server
- Install npm laravel echo dan pusher js
npm install --save-dev laravel-echo pusher-js
npm install laravel-mix@latest
npm run dev

- Jalankan PHP artisan migrate
- Jalankan php artisan queue:listen
- Jalankan php artisan db:seed

- untuk Unit Test Jalankan Perintah
  ./vendor/bin/phpunit  tests/Feature/Http/Controllers/PaymentControllerTest.php

jalankan Perintah php artisan serve
