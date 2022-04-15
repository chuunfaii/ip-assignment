<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Wishlist as WishlistModel;

class Wishlist extends Controller
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
        $wishlist_items = WishlistModel::all();
        $ret = [
            'wishlist_items' => $wishlist_items,
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
        $wishlist = WishlistModel::create([
            'artwork_id' => $request->artwork_id,
            'user_id' => $request->user_id,
        ]);

        $ret = [
            'wishlist' => $wishlist,
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
        $wishlist_items = WishlistModel::where('user_id', $id)->get();
        $ret = [
            'wishlist_items' => $wishlist_items,
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
        $wishlist = WishlistModel::find($id);

        $wishlist->update([
            'user_id' => $request->user_id,
            'artwork_id' => $request->artwork_id,
        ]);

        $wishlist->save();

        $ret = [
            'wishlist' => $wishlist,
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
        WishlistModel::where('user_id', $id)->delete();
        
        $this->ret['timestamp'] = now();
        $this->ret['status'] = 'OK';

        return response()->json($this->ret);
    }
}
