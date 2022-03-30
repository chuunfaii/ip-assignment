<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Artwork;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ArtistArtworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = auth()->user()->id;

        // $artworks = Artwork::all();

        $artworks = Artist::find($id)->artworks;

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
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator(Request $request)
    {
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
        $file = $request->file('artworkImage');

        if (empty($file) || empty($name) || empty($price) || empty($desc) || empty($qtt) || empty($cat)) {
            $errorMsg = "All fields is required. Please try again.";
            return redirect('my-artwork')->with('estatus', $errorMsg);
        } else {
            $artwork = new Artwork;
            $artwork->user_id = auth()->user()->id;
            $artwork->name = $name;
            $artwork->price = $price;
            $artwork->description = $desc;
            $artwork->quantity = $qtt;
            $artwork->category_id = $cat;
            if ($request->hasFile('artworkImage')) {
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('upload/artworks/', $filename);
                $artwork->image_url = $filename;
            }
            $artwork->save();
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
            'description' => $getArtwork->description,
            'image' => $getArtwork->image,
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
    public function update(Request $request)
    {
        $id = $request->input('artworkId');
        $artwork = Artwork::find($id);

        $name = $request->input('editName');
        $price = $request->input('editPrice');
        $desc = $request->input('editDesc');
        $qtt = $request->input('editQtt');
        $cat = $request->input('editCategory');
        $file = $request->file('editImage');

        //$artwork->artistId = auth()->user()->id;
        $artwork->name = $name;
        $artwork->price = $price;
        $artwork->description = $desc;
        $artwork->quantity = $qtt;
        $artwork->categoryId = $cat;
        if ($request->hasFile('editImage')) {
            $imagePath = 'upload/artworks/' . $artwork->image;
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('upload/artworks/', $filename);
            $artwork->image = $filename;
        }
        $artwork->save();
        return redirect('my-artwork')->with('status', 'Artwork Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->input('deleteid');
        $artwork = Artwork::find($id);
        $imagePath = 'upload/artworks/' . $artwork->image;
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }
        $artwork->delete();
        return redirect('/my-artwork')->with('status', 'Artwork Deleted Successfully');
    }
}
