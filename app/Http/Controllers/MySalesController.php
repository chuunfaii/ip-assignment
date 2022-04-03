<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artist;
use App\Models\Artwork;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MySalesController extends Controller{

    public function index(){
        $user_id = auth()->user()->id;
        $sales_exist = false;
        $order_item = DB::table('order_items')->select('order_id','artwork_id','quantity','created_at')->get();

        //$artworks = Artist::find($user_id)->artworks;

        foreach ($order_item as $item) {
            $artwork = Artwork::where('user_id',$user_id)->where('id',$item->artwork_id)->first();
            if ($artwork) {
                    $item->artwork_name = $artwork->name;
                    $item->price = $artwork->price;
                    $item->subtotal = $item->quantity * $artwork->price;
                    $sales_exist = true;
            }
        }

        return view('pages.my-sales',compact('order_item','artwork', 'sales_exist'));
    }
}