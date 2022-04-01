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
        
        // if (filled($id)) {
        //     $artwork = Artwork::all()->find($id);
        //     //if ($id == 'id') {
        //     $artist = User::all()->find($artwork->user_id);

        //     return view('pages.wishlist', compact('artwork', 'artist'));

        //     //} else {
        //     //Testing purpose
        //     //echo ("The id does not exist.");
        //     //}
        // } else {
        //     // TODO: Change it to something better.
        //     echo "No such file.";
        // }

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
               
                $artwork_id = $request->input('actionId');
                $user_id = $request->input('testId');

                

                $cart = new Cart();
                $cart->user_id = $user_id;
                $cart->artwork_id = $artwork_id;
                $cart->quantity = 1;
                
                $cart->save();

                return redirect()->back()->with('message', 'Wishlist has been added to cart.');
                break;

            case 'remove':
                $artwork_id = $request->input('actionId');
                $user_id = $request->input('testId');

                $ids = ['artwork_id'=>$artwork_id,'user_id'=>$user_id];

                $wishlist = Wishlist::where($ids);
                
                $wishlist->delete();
                return redirect()->back()->with('message', 'Wishlist Removed Successfully');

                break;
           
        }
    }
}
