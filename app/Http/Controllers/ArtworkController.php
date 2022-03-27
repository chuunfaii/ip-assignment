<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Artwork;

class ArtworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$products   = Artwork::all();
        $categories = Category::all();
        return view('pages.myArtwork', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $artwork = new Artwork;
        //$artwork -> artistId = Auth::id();
        $artwork -> name = $request->input('artworkName');
        $artwork -> price = $request->input('artworkPrice');
        $artwork -> description = $request->input('artworkDesc');
        $artwork -> quantity = $request->input('artworkQtt');
        $artwork -> categoryId = $request->input('artworkCategory') ;
        if($request->hasFile('artworkImage')){
            $file = $request -> file('artworkImage');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file-> move('upload/artworks/', $filename);
            $artwork-> image = $filename;
        }
        $artwork -> save();

        return redirect('myArtwork')->with('status', 'Artwork Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
