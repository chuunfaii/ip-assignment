<?php

// Author:  Quah Khai Gene

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artist;
use App\Models\Artwork;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $artists = Artist::all();

        if ($request->input('query')) {
            $query = $request->input('query');

            $artists = Artist::where(Artist::raw("CONCAT(first_name, ' ', last_name)"), 'LIKE', '%' . $query . '%')
                ->orWhere(Artist::raw("CONCAT(last_name, ' ', first_name)"), 'LIKE', '%' . $query . '%')
                ->get();
        }

        return view('pages.artists', compact('artists'));
    }

    /** 
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $artworks = Artwork::where('user_id', $id)->get();
        $artist = Artist::find($id);

        return view('pages.artist-profile', compact('artworks', 'artist'));
    }
}
