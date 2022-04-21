<?php

// Author:  Quah Khai Gene

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\Artist as ArtistModel;
use App\Models\Artwork as ArtworkModel;

class Artist extends Controller
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
        $artists = ArtistModel::all();
        $ret = [
            'artists' => $artists,
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
        $artist = ArtistModel::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type' => "artist",
        ]);

        $ret = [
            'artist' => $artist,
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
        $artist = ArtistModel::find($id);
        $ret = [
            'artist' => $artist,
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
        $artist = ArtistModel::find($id);

        $artist->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $artist->save();

        $ret = [
            'artist' => $artist,
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
        ArtworkModel::where('user_id', $id)->delete();
        ArtistModel::find($id)->delete();

        $this->ret['timestamp'] = now();
        $this->ret['status'] = 'OK';

        return response()->json($this->ret);
    }
}
