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
    return view('pages.home');
});

Route::get('/my-artwork', 'App\Http\Controllers\ArtworkController@index');

Route::post('/store-artwork', 'App\Http\Controllers\ArtworkController@store');

Route::get('/my-sales',function(){
    return view('pages.my-sales');
});

Route::get('/order-history',function(){
    return view('pages.order-history');
});
require __DIR__ . '/auth.php';
