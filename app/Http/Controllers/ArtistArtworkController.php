<?php

namespace App\Http\Controllers;

use Stripe\StripeClient;
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

        $artworks = Artist::find($id)->artworks;

        $categories = Category::all();

        return view('pages.my-artworks', compact('categories', 'artworks'));
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
        $stripe = new StripeClient('sk_test_51KkOjTJC2EY2ixMBbB9tD5XbwSDydaBRzB7i6gAvlOdbWbfT1dT3KgLYj6LFp6xwq7MsUw6XyPaPHChjdV3tBmqg00NopvLdXY');

        $name = $request->input('artworkName');
        $price = $request->input('artworkPrice');
        $desc = $request->input('artworkDesc');
        $qtt = $request->input('artworkQtt');
        $cat = $request->input('artworkCategory');
        $file = $request->file('artworkImage');

        if (empty($file) || empty($name) || empty($price) || empty($desc) || empty($qtt) || empty($cat)) {
            $errorMsg = "Failed to add artwork. All fields are required. Please try again.";
            return redirect('my-artwork')->with('error', $errorMsg);
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

            $stripe_product = $stripe->products->create([
                'name' => $artwork->name,
                'description' => $artwork->description,
            ]);

            $stripe_price = $stripe->prices->create([
                'unit_amount' => $artwork->price * 100,
                'currency' => 'usd',
                'product' => $stripe_product->id,
            ]);

            $artwork->stripe_product_id = $stripe_product->id;
            $artwork->stripe_price_id = $stripe_price->id;

            $artwork->save();

            return redirect()->route('my-artworks')->with('message', 'Artwork has been added successfully.');
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
        $id = $request->id;

        $getArtwork = Artwork::find($id);

        $artwork = array(
            'id' => $getArtwork->id,
            'name' => $getArtwork->name,
            'quantity' => $getArtwork->quantity,
            'price' => $getArtwork->price,
            'description' => $getArtwork->description,
            'image_url' => $getArtwork->image_url,
            'category_id' => $getArtwork->category_id,
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
        $stripe = new StripeClient('sk_test_51KkOjTJC2EY2ixMBbB9tD5XbwSDydaBRzB7i6gAvlOdbWbfT1dT3KgLYj6LFp6xwq7MsUw6XyPaPHChjdV3tBmqg00NopvLdXY');

        $id = $request->input('artworkId');

        $artwork = Artwork::find($id);

        $name = $request->input('editName');
        $price = $request->input('editPrice');
        $desc = $request->input('editDesc');
        $qtt = $request->input('editQtt');
        $cat = $request->input('editCategory');
        $file = $request->file('editImage');

        if (empty($name) || empty($price) || empty($desc) || empty($qtt) || empty($cat)) {
            $errorMsg = "Failed to edit artwork. All fields are required. Please try again.";
            return redirect()->route('my-artworks')->with('error', $errorMsg);
        } else {
            $artwork->name = $name;
            $artwork->price = $price;
            $artwork->description = $desc;
            $artwork->quantity = $qtt;
            $artwork->category_id = $cat;

            if ($request->hasFile('editImage')) {
                $imagePath = 'upload/artworks/' . $artwork->image_url;

                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }

                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('upload/artworks/', $filename);
                $artwork->image_url = $filename;
            }

            $stripe->products->update(
                $artwork->stripe_product_id,
                ['name' => $artwork->name, 'description' => $artwork->description],
            );

            $artwork->save();

            return redirect()->route('my-artworks')->with('message', 'Artwork has been updated successfully.');
        }
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

        $imagePath = 'upload/artworks/' . $artwork->image_url;

        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }

        $artwork->delete();

        return redirect()->route('my-artworks')->with('message', 'Artwork has been deleted successfully.');
    }
}
