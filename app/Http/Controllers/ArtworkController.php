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
        $artworks   = Artwork::all()->where('artistId', auth()->user()->id);
        $categories = Category::all();
        return view('pages.my-artwork', compact('categories', 'artworks'));
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
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        $name = $request->input('artworkName');
        $price = $request->input('artworkPrice');
        $desc = $request->input('artworkDesc');
        $qtt = $request->input('artworkQtt');
        $cat = $request->input('artworkCategory');
        $file = $request ->file('artworkImage');

        if(empty($file) || empty($name) || empty($price) || empty($desc) || empty($qtt) || empty($cat)){
            $errorMsg="All fields is required";
            return redirect('my-artwork')->with('estatus', $errorMsg);
        }else{
            $artwork = new Artwork;
            $artwork -> artistId = auth()->user()->id;
            $artwork -> name = $name;
            $artwork -> price = $price;
            $artwork -> description = $desc;
            $artwork -> quantity = $qtt;
            $artwork -> categoryId = $cat;
            if($request->hasFile('artworkImage')){
                $extension = $file->getClientOriginalExtension();
                $filename = time().'.'.$extension;
                $file-> move('upload/artworks/', $filename);
                $artwork-> image = $filename;
            }
            $artwork -> save();
            return redirect('my-artwork')->with('status', 'Artwork Added Successfully');
        }

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
    public function edit(Request $request)
    {
        $id = $request->id;
        $getArtwork = Artwork::find($id);
        $artwork = array(
            'id' => $getArtwork->id,
            'name' => $getArtwork->name,
            'quantity' => $getArtwork->quantity,
            'price' => $getArtwork->price,
            'description' => $getArtwork -> description,
            'image' => $getArtwork -> image,
            'categoryId' => $getArtwork->categoryId,
        );
        return json_encode($artwork);
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
