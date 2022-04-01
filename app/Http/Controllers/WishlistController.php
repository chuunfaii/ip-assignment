<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artwork;
use App\Models\User; 
use App\Models\Wishlist;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;


class WishlistController extends Controller
{
    public function index(){
       
        
            $wishlist = Wishlist::all()->where('user_id', auth()->user()->id);
            return view('pages.wishlist', compact('wishlist'));

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


     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateWishlist(Request $request)
    {
        switch ($request->input('wishlistBtn')) {
            case 'add-to-cart':
                // $artwork = Wishlist::all()->find($id);
                $id = $request->input('actionId');
                $artwork = Wishlist::all()->find($id);

                $cart = new Cart();
                $cart->user_id = auth()->user()->id;
                $cart->artwork_id = $artwork->id;
                $cart->quantity = 1;
                
                $cart->save();

                return redirect()->back()->with('message', 'Wishlist has been added to cart.');
                break;

            case 'remove':
                $id = $request->input('actionId');
                // $wishlist = Wishlist::find($id);
                $wishlist = Wishlist::all()->find($id);
                $wishlist->delete();
                return redirect()->back()->with('message', 'Wishlist Removed Successfully');

                break;
            // case 'add-to-cart':
            //     $id = $request->input('actionId');
            //     $wishlist = Wishlist::all()->find($id);
            //     // $wishlist->quantity = 1;
            //     $wishlist->save();
            //     return redirect()->back()->with('message', 'Add to Cart Successfully');

            //     break;
        }
    }
}
