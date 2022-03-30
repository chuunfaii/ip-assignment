<?php

namespace App\Http\Controllers;

use App\Models\Artwork;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // TODO: Change to 6 later.
        $artworks = Artwork::inRandomOrder()->take(3)->get();

        // return view('pages.home', compact('artworks'));

        return view('pages.home', compact('artworks'));
    }
}
