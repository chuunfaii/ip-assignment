<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ArtistController extends Controller
{
    public function index(){
        $artists = User::all()->where('type','=','artist');
        return view('pages.artists',['artists'=>$artists]);
    }


}
