<?php

// Author:  Lee Chun Fai

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;

        $wishlists = Wishlist::where('user_id', $user_id)->get();

        return view('pages.wishlist', compact('wishlists'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        switch ($request->input('action')) {
            case 'add-to-cart':
                $user_id = $request->input('user_id');
                $artwork_id = $request->input('artwork_id');

                $ids = ['user_id' => $user_id, 'artwork_id' => $artwork_id];

                if (Cart::where($ids)->exists()) {
                    return redirect()->back()->with('error', 'Item already exists in your cart.');
                }

                Cart::create([
                    'user_id' => $user_id,
                    'artwork_id' => $artwork_id,
                    'quantity' => 1,
                ]);

                Wishlist::where($ids)->delete();

                return redirect()->back()->with('message', 'Wishlisted item has been added to cart.');

            case 'remove':
                $user_id = $request->input('user_id');
                $artwork_id = $request->input('artwork_id');

                $ids = ['user_id' => $user_id, 'artwork_id' => $artwork_id];

                $wishlist = Wishlist::where($ids)->delete();

                return redirect()->back()->with('message', 'Wishlisted item has been removed successfully.');
        }
    }
}
