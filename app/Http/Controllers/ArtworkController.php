<?php

namespace App\Http\Controllers;

use App\Models\Artwork;
use Illuminate\Http\Request;

class ArtworkController extends Controller
{
    public function index(Request $request)
    {
        $artworks = Artwork::all();

        if ($request->input('query')) {
            $query = $request->input('query');

            $artworks = Artwork::where('name', 'like', "%$query%")->get();
        }

        return view('pages.artworks')->with('artworks', $artworks);
    }
}
