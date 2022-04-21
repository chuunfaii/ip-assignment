<?php

// Authors:  Chiam Yee Hang & Lee Chun Fai

namespace App\Http\Controllers;

use App\Models\Artwork;
use App\Models\Category;
use App\Models\User;
use App\Models\wishlist;
use App\Models\Cart;
use Illuminate\Http\Request;

class ArtworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $artworks = Artwork::all();

        if ($category = $request->input('category')) {
            $artworks = Artwork::where('category_id', $category)->get();
        }

        if ($query = $request->input('query')) {
            $artworks = Artwork::where('name', 'like', "%$query%")->get();
        }

        if ($sort = $request->input('sort')) {
            if ($sort == 'asc') {
                $artworks = $artworks->sortBy('name');
            } else if ($sort == 'desc') {
                $artworks = $artworks->sortByDesc('name');
            } else if ($sort == 'low') {
                $artworks = $artworks->sortBy('price');
            } else if ($sort == 'high') {
                $artworks = $artworks->sortByDesc('price');
            }
        }

        return view('pages.artworks')->with(compact('artworks'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if ($artwork = Artwork::find($id)) {
            return view('pages.artwork-details', compact('artwork'));
        }

        return view('errors.404');
    }

    public function wishlist_cart(Request $request, $artwork_id)
    {
        $action = $request->input('action');
        $user_id = auth()->user()->id;

        if ($action == 'wishlist') {
            if (Wishlist::where('artwork_id', $artwork_id)->where('user_id', $user_id)->exists()) {
                return redirect()->back()->with('error', 'Artwork is already in your wishlist.');
            }

            Wishlist::create([
                'artwork_id' => $artwork_id,
                'user_id' => $user_id,
            ]);

            return redirect()->back()->with('message', 'Artwork has been added to the wishlist.');
        } else if ($action == 'cart') {
            $artwork = Artwork::find($artwork_id);

            $request->validate([
                'quantity' => [
                    'required',
                    'numeric',
                ],
            ]);

            $quantity = $request->quantity;

            if ($cart = Cart::where('user_id', $user_id)->where('artwork_id', $artwork_id)->first()) {
                $cart->update([
                    'quantity' => $quantity + $cart->quantity,
                ]);
            } else {
                Cart::create([
                    'user_id' => $user_id,
                    'artwork_id' => $artwork_id,
                    'quantity' => $quantity,
                ]);
            }

            return redirect()->back()->with('message', 'Artwork has been added to the cart.');
        }
    }
}
