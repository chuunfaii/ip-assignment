<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ArtworkController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\ArtistArtworkController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\MySalesController;
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
Route::post('/store-artwork', [ArtistArtworkController::class, 'store']);
Route::post('/fetch-artwork', [ArtistArtworkController::class, 'edit']);
Route::post('/update-artwork', [ArtistArtworkController::class, 'update']);
Route::post('/delete-artwork', [ArtistArtworkController::class, 'destroy']);

Route::get('/my-sales', function () {
    return view('pages.my-sales');
})->name('my-sales');

// Route::get('/order-history', function () {
//     return view('pages.order-history');
// });

Route::get('/artists', [ArtistController::class, 'index'])->name('artists');

Route::get('/artist/{id}', [ArtistController::class, 'show']);

Route::get('/artworks', [ArtworkController::class, 'index'])->name('artworks');

Route::get('/artwork/{id}', [ArtworkController::class, 'show']);



Route::get('/my-sales',[MySalesController::class,'index'])->name('my-sales');

require __DIR__ . '/auth.php';
