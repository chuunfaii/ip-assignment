<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ArtworkController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function () {
  Route::get('/register', [RegisterController::class, 'create'])->name('register');

  Route::post('/register', [RegisterController::class, 'store']);

  Route::get('/login', [LoginController::class, 'create'])->name('login');

  Route::post('/login', [LoginController::class, 'store']);
});

Route::middleware('auth')->group(function () {

  Route::get('/account/edit', [UserController::class, 'create'])->name('edit-account');

  Route::post('/account/edit', [UserController::class, 'store']);

  Route::delete('/account/delete', [UserController::class, 'destroy']);

  Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');

  Route::get('/cart', [CartController::class, 'index'])->name('cart');

  Route::post('/add-to-wishlist/{id}',[ArtworkController::class,'add_wishlist'])->name('wishlist_and_cart');

  Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist');

  

//   Route::get('/wishlist', function () {
//     return view('pages.wishlist');
// })->name('wishlist');


});
