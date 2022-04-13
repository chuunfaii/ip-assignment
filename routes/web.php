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

Route::get('/', [HomeController::class, 'index'])
        ->name('home');

Route::get('/artists', [ArtistController::class, 'index'])
        ->name('artists');

Route::get('/artist/{id}', [ArtistController::class, 'show']);

Route::get('/artworks', [ArtworkController::class, 'index'])
        ->name('artworks');

Route::get('/artwork/{id}', [ArtworkController::class, 'show']);

require __DIR__ . '/auth.php';

require __DIR__ . '/internals/xml.php';
