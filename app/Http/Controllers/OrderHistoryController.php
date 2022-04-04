<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Artist;
use App\Models\Artwork;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class OrderHistoryController extends Controller
{
    public function index(){

            $user_id = auth()->user()->id;
            $sales_exist = false;
            $order = DB::table('orders')->where('user_id',$user_id)->get();
            $order_arr = [];
            foreach($order as $o){
                $order_item = DB::table('order_items')->where('order_id',$o->id)->first();
                $artwork = Artwork::find($order_item->artwork_id);
                $order_item->artwork_name= $artwork->name;
                $order_item->price = $artwork->price;
                $order_item->subtotal = $order_item->quantity * $artwork->price;
                array_push( $order_arr,$order_item);
            }
            if($order->count() > 0){
                $sales_exist = true;
                return view('pages.order-history',compact('order_item', 'sales_exist','order_arr'));
            }else{
                return view('pages.order-history',compact('sales_exist','order_arr'));
            }
             




}
}