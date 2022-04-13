<?php

namespace App\Http\Controllers;

use App\Http\Internals\ArtistiqueXML;
use Illuminate\Http\Request;

class XMLController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.xml-add');
    }

    public function add_artwork(Request $request)
    {
        $file = $request->file('xmlFile');
        
        $success = ArtistiqueXML::insertArtwork($file);

        if ($success) {
            return redirect('/xml/add')->with('message', 'Artwork XML file has been added successfully.');
        }

        return redirect('/xml/add')->with('error', 'Artwork XML file failed to be added.');
    }

    public function add_artist(Request $request)
    {
        $file = $request->file('xmlFile');
        
        $success = ArtistiqueXML::insertArtist($file);

        if ($success) {
            return redirect('/xml/add')->with('message', 'Artist XML file has been added successfully.');
        }

        return redirect('/xml/add')->with('error', 'Artist XML file failed to be added.');
    }

    public function add_customer(Request $request)
    {
        $file = $request->file('xmlFile');
        
        $success = ArtistiqueXML::insertCustomer($file);

        if ($success) {
            return redirect('/xml/add')->with('message', 'Customer XML file has been added successfully.');
        }

        return redirect('/xml/add')->with('error', 'Customer XML file failed to be added.');
    }

    public function add_wishlist(Request $request)
    {
        $file = $request->file('xmlFile');
        
        $success = ArtistiqueXML::insertWishlist($file);

        if ($success) {
            return redirect('/xml/add')->with('message', 'Wishlist XML file has been added successfully.');
        }

        return redirect('/xml/add')->with('error', 'Wishlist XML file failed to be added.');
    }
}
