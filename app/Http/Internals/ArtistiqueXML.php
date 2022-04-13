<?php

namespace App\Http\Internals;

use App\Models\Artwork;
use App\Models\Artist;
use App\Models\Customer;
use App\Models\Wishlist;

class ArtistiqueXML {

    public function getArtworks() {
        $artworksArray = [];

        foreach (Artwork::all() as $artwork) {
            $artwork =
                [
                    '_attributes' => [
                        'id' => $artwork->id
                    ],
                    'name' => $artwork->name,
                    'quantity' => $artwork->quantity,
                    'price' => $artwork->presentPrice(),
                    'description' => $artwork->description,
                    'image_url' => $artwork->image_url,
                    'artist' => $artwork->artist->presentFullName(),
                    'category' => $artwork->category->name,
                ];
            array_push($artworksArray, $artwork);
        }

        return ['artworks' => ['artwork' => $artworksArray]];
    }

    public function getArtists() {
        $artistsArray = [];

        foreach (Artist::all() as $artist) {
            $artist =
                [
                    '_attributes' => [
                        'id' => $artist->id,
                    ],
                    'first_name' => $artist->first_name,
                    'last_name' => $artist->last_name,
                    'full_name' => $artist->presentFullName(),
                    'email' => $artist->email,
                    'bio' => $artist->bio,
                    'image_url' => $artist->image_url,
                ];
            array_push($artistsArray, $artist);
        }

        return ['artists' => ['artist' => $artistsArray]];
    }

    public function getCustomers() {
        $customersArray = [];

        foreach (Customer::all() as $customer) {
            $customer =
                [
                    '_attributes' => [
                        'id' => $customer->id,
                    ],
                    'first_name' => $customer->first_name,
                    'last_name' => $customer->last_name,
                    'name' => $customer->presentFullName(),
                    'email' => $customer->email,
                ];
            array_push($customersArray, $customer);
        }

        return ['customers' => ['customer' => $customersArray]];
    }

    public function getWishlist() {
        $wishlistArray = [];
        
        $user_id = auth()->user()->id;
        $wishlist = Wishlist::where('user_id', $user_id)->get();

        foreach ($wishlist as $item) {
            $item =
                [
                    '_attributes' => [
                        'id' => $item->id,
                    ],
                    'artwork' => $item->artwork->name,
                    'artist' => $item->artwork->artist->presentFullName(),
                    'created_at' => $item->created_at,
                ];
            array_push($wishlistArray, $item);
        }

        return ['wishlist' => ['item' => $wishlistArray]];
    }

    public function showArtworks() {
        return response()->xml(self::getArtworks(), 200, [], ['root' => 'artistique']);
    }

    public function showArtists() {
        return response()->xml(self::getArtists(), 200, [], ['root' => 'artistique']);
    }

    public function showCustomers() {
        return response()->xml(self::getCustomers(), 200, [], ['root' => 'artistique']);
    }

    public function showWishlist() {
        if (!auth()->user()) {
            return abort(404);
        }

        if (!auth()->user()->isCustomer()) {
            return abort(404);
        }

        return response()->xml(self::getWishlist(), 200, [], ['root' => 'artistique']);
    }

}
