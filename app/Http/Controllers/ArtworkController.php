<?php

namespace App\Http\Controllers;

use App\Models\Artwork;
use App\Models\Category;
use App\Models\User;  
use App\Models\wishlist;
use Illuminate\Http\Request;

class ArtworkController extends Controller
{
    public function index(Request $request)
    {
        $artworks = Artwork::all();

        if ($query = $request->input('query')) {
            $artworks = Artwork::where('name', 'like', "%$query%")->get();
        }

        if ($sort = $request->input('sort')) {
            if ($sort == 'asc') {
                $artworks = $artworks->sortBy('name');
            } else if ($sort == 'desc') {
                $artworks = $artworks->sortByDesc('name');
            } else if ($sort == 'low') {
                $artworks = $artworks->sortBy('price');
            } else if ($sort == 'high') {
                $artworks = $artworks->sortByDesc('price');
            }
        }

        return view('pages.artworks')->with(compact('artworks'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //this filled cannot work yet 
        if (filled($id)) {
            $artwork = Artwork::all()->find($id);
            //if ($id == 'id') {
                $category = Category::all()->find($artwork->category_id);
                $artist = User::all()->find($artwork->user_id);

                return view('pages.artwork-detail', compact('category', 'artwork', 'artist'));

            //} else {
                //Testing purpose
                //echo ("The id does not exist.");
            //}
        } else {
            // TODO: Change it to something better.
            echo "No such file.";
        }

        // //this filled cannot work yet 
        // if (filled($id)) {
        //     $artwork = Artwork::find($id);
        //     if ($id == 'id') {
        //         $category = Category::all()->find($artwork->categoryId);
        //         $artist = User::all()->find($artwork->artistId);

        //         return view('pages.artwork-detail', compact('category', 'artwork', 'artist'));
        //     } else {
        //         //Testing purpose
        //         echo ("The id does not exist.");
        //     }
        // } else {
        //     echo ("No such file.");
        // }
    }

    public function add_wishlist(Request $request,$id){
            switch($request->input('action')){
                    case 'wishlist':
                        $artwork = Artwork::all()->find($id);
                        $category = Category::all()->find($artwork->category_id);
                        $artist = User::all()->find($artwork->user_id);
                        
                        return view('pages.wishlist', compact('category', 'artwork', 'artist'));
                        
                        $wishlist = new Wishlist();
                        $wishlist->user_id = auth()->user()->id;
                        $wishlist->artwork_id = $artworkid;

                        $wishlist->save();
                
                    return redirect('artwork')->with('status','Artwork has been added to wishlist.');
                    break;
                case 'cart':
                    
                    break;
            }
        
        
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
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
