<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ArtworkController;
use App\Http\Controllers\Auth\ArtistController;
use App\Http\Controllers\ArtistArtworkController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WishlistController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

//Artist Add, Update, Delete & Retrieve Artworks
Route::get('/my-artwork', [ArtistArtworkController::class, 'index'])->name('my-artwork');
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

Route::get('/profile-page', [ProfileController::class, 'index'])->name('profile-page');

Route::get('/artist-profile/{id}', [ProfileController::class, 'create']);

Route::get('/artists', 'App\Http\Controllers\ArtistController@index')->name('artists');

Route::get('/artworks', [ArtworkController::class, 'index'])->name('artworks');

Route::get('/artwork/{id}', [ArtworkController::class, 'show']);

require __DIR__ . '/auth.php';
