<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ArtistController extends Controller
{
    public function index(Request $request){
        // $artists = User::all()->where('type','=','artist');
        // return view('pages.artists',['artists'=>$artists]);

        $artists = User::all()->where('type','=','artist');

        if ($request->input('query')) {
            $query = $request->input('query');

            // $artists = User::where('first_name', 'like', "%$query%")->get();
            $artists = User::where(User::raw("CONCAT(first_name,' ',last_name)"), 'LIKE', '%' . $query . '%')
                        ->orWhere(User::raw("CONCAT(last_name,' ',first_name)"), 'LIKE', '%' . $query . '%')
                        ->get();
           
            
        }

        return view('pages.artists')->with('artists', $artists);
    }


}
