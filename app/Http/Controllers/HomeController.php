<?php

// Author:  Lee Chun Fai

namespace App\Http\Controllers;

use App\Models\Artwork;
use App\Models\Category;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artworks = Artwork::inRandomOrder()->take(8)->get();
        $categories = Category::all();

        return view('pages.home', compact('artworks', 'categories'));
    }
}
