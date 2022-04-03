<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ArtworkController;
use App\Http\Controllers\ArtistArtworkController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
  // Register

  Route::get('/register', [RegisterController::class, 'create'])
            ->name('register');

  Route::post('/register', [RegisterController::class, 'store']);

  // Login

  Route::get('/login', [LoginController::class, 'create'])
            ->name('login');

  Route::post('/login', [LoginController::class, 'store']);
});

Route::middleware('auth')->group(function () {
  // Customer & Artist - Edit Account

  Route::get('/account/edit', [UserController::class, 'create'])
            ->name('edit-account');

  Route::post('/account/edit', [UserController::class, 'store']);

  Route::post('/account/delete', [UserController::class, 'destroy'])
            ->name('delete-account');

  // Artist - My Artworks

  Route::get('/my-artworks', [ArtistArtworkController::class, 'index'])
            ->name('my-artworks')
            ->middleware('role:artist');

  // Customer - Cart & Wishlist-Cart

  Route::get('/cart', [CartController::class, 'index'])
            ->name('cart');
  
  Route::post('/update-cart', [CartController::class, 'updateCart']);
  
  Route::post('/wishlist-cart/{id}', [ArtworkController::class, 'wishlist_cart'])
            ->name('wishlist-cart')
            ->middleware('role:customer');
  
  // Customer - Wishlist

  Route::get('/wishlist', [WishlistController::class, 'index'])
            ->name('wishlist');
  
  Route::post('/update-wishlist',[WishlistController::class, 'updateWishlist']);
  
  // Customer - Checkout

  Route::post('/checkout', [OrderController::class, 'checkout'])
            ->name('checkout')
            ->middleware('role:customer');
            
  // Customer - Thanks

  Route::get('/thanks', [OrderController::class, 'index'])
            ->name('thanks');
            
  // Customer & Artist - Logout

  Route::post('/logout', [LoginController::class, 'destroy'])
            ->name('logout');
});
