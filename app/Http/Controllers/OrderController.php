<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Stripe\Stripe;
use Stripe\StripeClient;
use Stripe\Checkout\Session;
use Illuminate\Http\Request;
use App\Models\Artwork;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $now = Carbon::now()->toDateTimeString();

        $user_id = auth()->user()->id;

        $carts = Cart::all()->where('user_id', $user_id);

        $order_id = DB::table('orders')->insertGetId([
            'user_id' => $user_id,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        foreach ($carts as $cart) {
            DB::table('order_items')->insert([
                'order_id' => $order_id,
                'artwork_id' => $cart->artwork_id,
                'quantity' => $cart->quantity,
                'created_at' => $now,
                'updated_at' => $now,
            ]);

            $artwork = Artwork::find($cart->artwork_id);

            $artwork->quantity = $artwork->quantity - $cart->quantity;

            $artwork->save();
        }

        Cart::where('user_id', $user_id)->delete();

        return view('pages.thanks');
    }

    public function checkout()
    {
        Stripe::setApiKey('sk_test_51KkOjTJC2EY2ixMBbB9tD5XbwSDydaBRzB7i6gAvlOdbWbfT1dT3KgLYj6LFp6xwq7MsUw6XyPaPHChjdV3tBmqg00NopvLdXY');

        $stripe = new StripeClient('sk_test_51KkOjTJC2EY2ixMBbB9tD5XbwSDydaBRzB7i6gAvlOdbWbfT1dT3KgLYj6LFp6xwq7MsUw6XyPaPHChjdV3tBmqg00NopvLdXY');

        $user_id = auth()->user()->id;

        $line_items = [];

        $carts = Cart::all()->where('user_id', $user_id);

        foreach ($carts as $cart) {
            $line_item = [
                'price' => $cart->artwork->stripe_price_id,
                'quantity' => $cart->quantity,
            ];

            array_push($line_items, $line_item);
        }

        $checkout_session = Session::create([
            'line_items' => $line_items,
            'mode' => 'payment',
            'success_url' => route('thanks'),
            'cancel_url' => route('cart'),
            'payment_method_types' => ['card'],
        ]);

        return redirect($checkout_session->url);
    }
}
