<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artist;
use App\Models\Artwork;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MySalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;

        $sales_exist = false;

        $order_items = DB::table('order_items')->select('order_id', 'artwork_id', 'quantity', 'created_at')->get();

        foreach ($order_items as $order_item) {
            $ids = ['user_id' => $user_id, 'id' => $order_item->artwork_id];

            $artwork = Artwork::where($ids)->first();

            if ($artwork) {
                $order_item->artwork_name = $artwork->name;
                $order_item->price = $artwork->price;
                $order_item->subtotal = $order_item->quantity * $artwork->price;
                $sales_exist = true;
            }
        }

        return view('pages.my-sales', compact('order_items', 'artwork', 'sales_exist'));
    }
}