<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ArtworkController;
use App\Http\Controllers\Auth\ArtistController;
use App\Http\Controllers\ArtistArtworkController;
use Illuminate\Support\Facades\Route;
use App\Models\Artwork;

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

//Artist Add, Update, Delete & Retrieve Artworks
Route::get('/my-artwork', [ArtistArtworkController::class, 'index']);
Route::post('/store-artwork', [ArtistArtworkController::class, 'store']);
Route::post('/fetch-artwork', [ArtistArtworkController::class, 'edit']);
Route::post('/update-artwork', [ArtistArtworkController::class, 'update']);
Route::post('/delete-artwork', [ArtistArtworkController::class, 'destroy']);

Route::get('/my-sales', function () {
    return view('pages.my-sales');
})->name('my-sales');

Route::get('/order-history', function () {
    return view('pages.order-history');
});

Route::get('/profile-page', function () {
    $artworks   = Artwork::all()->where('artistId', auth()->user()->id);
    return view('pages.profile-page', compact('artworks'));
})->name('profile-page');

Route::get('/wishlist', function () {
    return view('pages.wishlist');
})->name('wishlist');

Route::get('/artists', 'App\Http\Controllers\ArtistController@index')->name('artists');

Route::get('/artworks', [ArtworkController::class, 'index'])->name('artworks');

Route::get('/artwork/{id}',[ArtworkController::class,'show']);

Route::post('/add-to-wishlist/{id}',[ArtworkController::class,'add_wishlist'])->name('wishlist_and_cart');

require __DIR__ . '/auth.php';
