<?php

// Author:  Lee Jun Xian

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stripe\StripeClient;

use App\Models\Artwork as ArtworkModel;

class Artwork extends Controller
{
    private $ret = [
        'status' => 'unknown',
        'data' => [],
        'timestamp' => null,
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artworks = ArtworkModel::all();
        $ret = [
            'artworks' => $artworks,
        ];
        $this->ret['data'] = $ret;
        $this->ret['timestamp'] = now();
        $this->ret['status'] = 'OK';

        return response()->json($this->ret);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $stripe = new StripeClient('sk_test_51KkOjTJC2EY2ixMBbB9tD5XbwSDydaBRzB7i6gAvlOdbWbfT1dT3KgLYj6LFp6xwq7MsUw6XyPaPHChjdV3tBmqg00NopvLdXY');

        $artwork = new ArtworkModel;
        $artwork->user_id = $request->user_id;
        $artwork->name = $request->name;
        $artwork->price = $request->price;
        $artwork->description = $request->description;
        $artwork->quantity = $request->quantity;
        $artwork->category_id = $request->category_id;
        $artwork->image_url = $request->image_url;

        $stripe_product = $stripe->products->create([
            'name' => $artwork->name,
            'description' => $artwork->description,
        ]);

        $stripe_price = $stripe->prices->create([
            'unit_amount' => $artwork->price * 100,
            'currency' => 'usd',
            'product' => $stripe_product->id,
        ]);

        $artwork->stripe_product_id = $stripe_product->id;
        $artwork->stripe_price_id = $stripe_price->id;

        $artwork->save();

        $ret = [
            'artwork' => $artwork,
        ];
        $this->ret['data'] = $ret;
        $this->ret['timestamp'] = now();
        $this->ret['status'] = 'OK';

        return response()->json($this->ret);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $artwork = ArtworkModel::find($id);
        $ret = [
            'artwork' => $artwork,
        ];
        $this->ret['data'] = $ret;
        $this->ret['timestamp'] = now();
        $this->ret['status'] = 'OK';

        return response()->json($this->ret);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $stripe = new StripeClient('sk_test_51KkOjTJC2EY2ixMBbB9tD5XbwSDydaBRzB7i6gAvlOdbWbfT1dT3KgLYj6LFp6xwq7MsUw6XyPaPHChjdV3tBmqg00NopvLdXY');

        $artwork = ArtworkModel::find($id);

        $artwork->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'category_id' => $request->category_id,
            'image_url' => $request->image_url,
        ]);

        $stripe->products->update(
            $artwork->stripe_product_id,
            ['name' => $artwork->name, 'description' => $artwork->description],
        );

        $artwork->save();

        $ret = [
            'artwork' => $artwork,
        ];
        $this->ret['data'] = $ret;
        $this->ret['timestamp'] = now();
        $this->ret['status'] = 'OK';

        return response()->json($this->ret);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ArtworkModel::find($id)->delete();

        $this->ret['timestamp'] = now();
        $this->ret['status'] = 'OK';

        return response()->json($this->ret);
    }
}
