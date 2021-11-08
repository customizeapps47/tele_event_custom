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

Route::get('/', 'TeleManagerController@index')->middleware(['verify.shopify'])->name('home');
// Route::resource('tele','TeleManagerController');
Route::resource('tele','TeleManagerController')->middleware(['verify.shopify']);

Route::post('/webhooks', 'WebhookController@listenWebhooks');



Route::post('data_request', 'GDPRControleler@customersDataRequest');
Route::post('redact', 'GDPRControleler@customersRedact');
Route::post('shop/redact', 'GDPRControleler@shopRedact');