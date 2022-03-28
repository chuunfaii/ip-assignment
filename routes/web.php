<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ArtistsController;
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
})->name('home');

Route::redirect('/home', '/');

Route::get('/my-artwork', 'App\Http\Controllers\ArtworkController@index');

Route::post('/store-artwork', 'App\Http\Controllers\ArtworkController@store');

Route::get('/my-sales',function(){
    return view('pages.my-sales');
});

Route::get('/order-history',function(){
    return view('pages.order-history');
});

Route::get('/profile-page',function(){
    return view('pages.profile-page');
});

Route::get('/wishlist',function(){
    return view('pages.wishlist');
});

Route::get('/artists',function(){
    return view('pages.artists');
});

Route::get('/edit-artist-account',function(){
    return view('pages.edit-artist-account');
});

Route::get('artists',[ArtistsController::class,'index']);

require __DIR__ . '/auth.php';
