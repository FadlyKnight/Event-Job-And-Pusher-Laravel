- composer install
- Setting .env
- atur Database sesuai dengan configrasi anda
- atur value env
menjadi : 
BROADCAST_DRIVER=pusher <br/>
QUEUE_CONNECTION=database <br/>
PUSHER_APP_ID=114xxx <br/>
PUSHER_APP_KEY=1a29fceaxxxxx <br/>
PUSHER_APP_SECRET=a84920432exxxxx <br/>
PUSHER_APP_CLUSTER=ap1 <br/>

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
