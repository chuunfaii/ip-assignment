<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artwork;
use App\Models\User; 

class WishlistController extends Controller
{
    public function index(Request $request){
        // $artists = User::all()->where('type','=','artist');
        // return view('pages.artists',['artists'=>$artists]);

        $artists = User::all();
        $artworks = Artwork::all();

       

        return view('pages.wishlist');
    }
}
