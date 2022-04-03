<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CartController;
use App\Models\Cart;


class OrderHistoryController extends Controller
{
    public function index(){
        $customer_id = auth()->user()->id;

        // $orderHistory = Cart::all()->where('user_id', $customer_id);
        
        $sales = DB::table('order_items')->select('order_id','artwork_id','quantity','created_at','updated_at')->get();
        
        return view('pages.order-history',compact('order'));

        
        

}
}

