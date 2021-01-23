<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'ajax'], function () {
    Route::get('/', 'PaymentController@index')->name('get.payments');
    Route::post('/create', 'PaymentController@insert')->name('insert.payments');
    Route::delete('/delete', 'PaymentController@delete')->name('delete.payments');
});

Route::get('/tes', function () {
    // $data = event(new App\Events\PushNotif());
    // event(new App\Events\PushNotif(''));
    // event(new App\Events\EventSend('Hello World')); 
    $data = event(new App\Events\TryEvent('Hello World asahsh Guts', 'data')); 
    print_r($data);
    echo 'hi';
});
