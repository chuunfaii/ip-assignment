<?php

// Authors: Chiam Yee Hang, Lee Chun Fai, Lee Jun Xian & Quah Khai Gene

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\Artwork;
use App\Http\Controllers\API\Artist;
use App\Http\Controllers\API\Customer;
use App\Http\Controllers\API\Wishlist;

use App\Http\Models\Artwork as ArtworkModel;
use App\Http\Resources\TestCollection;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/swagger.json', function () {
    return response()->file(resource_path('api/swagger.json'));
});

Route::apiResources([
    'artworks' => Artwork::class,
    'artists' => Artist::class,
    'customers' => Customer::class,
    'wishlist' => Wishlist::class,
]);
