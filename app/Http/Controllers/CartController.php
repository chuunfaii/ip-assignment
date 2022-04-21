<?php

// Author:  Lee Chun Fai

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Artwork;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;

        $carts = Cart::all()->where('user_id', $user_id);

        $total_price = 0;

        foreach ($carts as $cart) {
            $total_price += $cart->subtotal();
        }

        return view('pages.cart', compact('carts', 'total_price'));
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
            case 'update':
                $cart_id = $request->input('cart_id');

                $cart = Cart::find($cart_id);

                $cart->quantity = $request->input('quantity');

                $cart->save();

                return redirect()->back()->with('message', 'Quantity has been updated successfully.');

            case 'remove':
                $cart_id = $request->input('cart_id');

                Cart::find($cart_id)->delete();

                return redirect()->back()->with('message', 'Cart item has been removed successfully.');
        }
    }
}
