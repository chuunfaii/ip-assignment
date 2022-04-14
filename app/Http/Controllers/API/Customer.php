<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\Customer as CustomerModel;
use App\Models\Wishlist as WishlistModel;

class Customer extends Controller
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
        $customers = CustomerModel::all();
        $ret = [
            'customers' => $customers,
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
        $customer = CustomerModel::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type' => "customer",
        ]);

        $ret = [
            'customer' => $customer,
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
        $customer = CustomerModel::find($id);
        $ret = [
            'customer' => $customer,
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
        $customer = CustomerModel::find($id);

        $customer->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $customer->save();

        $ret = [
            'customer' => $customer,
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
        CustomerModel::find($id)->delete();

        $this->ret['timestamp'] = now();
        $this->ret['status'] = 'OK';

        return response()->json($this->ret);
    }
}
