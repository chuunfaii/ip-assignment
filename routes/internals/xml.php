<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Internals\ArtistiqueXML;

Route::get('/xml/artworks/raw', function(){
    return ArtistiqueXML::showArtworks();
});

Route::get('/xml/artists/raw', function(){
    return ArtistiqueXML::showArtists();
});

Route::get('/xml/customers/raw', function(){
    return ArtistiqueXML::showCustomers();
});

Route::get('/xml/wishlist/raw', function(){
    return ArtistiqueXML::showWishlist();
});

Route::get('/xml/artworks', function(){
    return ArtistiqueXML::showArtworksXSLT();
});

Route::get('/xml/artists', function(){
    return ArtistiqueXML::showArtistsXSLT();
});

Route::get('/xml/customers', function(){
    return ArtistiqueXML::showCustomersXSLT();
});

Route::get('/xml/wishlist', function(){
    return ArtistiqueXML::showWishlistXSLT();
});
