<?php

namespace App\Http\Controllers;

use App\Models\Artwork;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $artworks = Artwork::inRandomOrder()->take(6)->get();

        return view('pages.home', compact('artworks'));
    }
}
