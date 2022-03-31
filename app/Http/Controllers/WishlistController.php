<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artwork;
use App\Models\User; 
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;


class WishlistController extends Controller
{
    public function index(){
        // $artists = User::all()->where('type','=','artist');
        // return view('pages.artists',['artists'=>$artists]);
        
            $wishlist = Wishlist::where('user_id',auth()->user()->id);
            return view('pages.wishlist', compact('wishlist'));

            //} else {
            //Testing purpose
            //echo ("The id does not exist.");
            //}
        
         
        

        //return view('pages.wishlist',compact('wishlist'));
    }

    public function show($id)
    {
        
        if (filled($id)) {
            $artwork = Artwork::all()->find($id);
            //if ($id == 'id') {
            $artist = User::all()->find($artwork->user_id);

            return view('pages.wishlist', compact('artwork', 'artist'));

            //} else {
            //Testing purpose
            //echo ("The id does not exist.");
            //}
        } else {
            // TODO: Change it to something better.
            echo "No such file.";
        }

    }
}
