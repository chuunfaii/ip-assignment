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

Route::get('/my-artwork', 'App\Http\Controllers\ArtistArtworkController@index');

Route::post('/store-artwork', 'App\Http\Controllers\ArtistArtworkController@store');

Route::post('/fetch-artwork', 'App\Http\Controllers\ArtistArtworkController@edit');

Route::post('/update-artwork/{id}', 'App\Http\Controllers\ArtistArtworkController@update');

Route::post('/delete-artwork/{id}', 'App\Http\Controllers\ArtistArtworkController@destroy');

Route::get('/my-sales', function () {
    return view('pages.my-sales');
})->name('my-sales');

Route::get('/order-history', function () {
    return view('pages.order-history');
});

Route::get('/profile-page', function () {
    return view('pages.profile-page');
})->name('profile-page');

Route::get('/wishlist', function () {
    return view('pages.wishlist');
});

Route::get('/artists', function () {
    return view('pages.artists');
});

require __DIR__ . '/auth.php';
