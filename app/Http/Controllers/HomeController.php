<?php

namespace App\Http\Controllers;

use App\Models\Artwork;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        $artworks = Artwork::inRandomOrder()->take(6)->get();
        $categories = Category::all();

        return view('pages.home', compact('artworks', 'categories'));
    }
}
