<?php

namespace App\Http\Internals;

use App\Models\Artwork;
use App\Models\Artist;
use App\Models\Customer;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Hash;
use Stripe\StripeClient;

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
                    'image_url' => asset('upload/artworks/' . $artwork->image_url),
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
            $image_url = $artist->image_url;
            if ($artist->image_url == '') {
                $image_url = 'https://i.pinimg.com/564x/26/cf/3c/26cf3c80b7b5923f89fba8fe140dd660.jpg';
            }
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
                    'image_url' => $image_url,
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
                    'full_name' => $customer->presentFullName(),
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
                    'image_url' => asset('upload/artworks/' . $item->artwork->image_url),
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

    public function showArtworksXSLT() {
        $xml = new \DOMDocument;
        $xml->loadXML(xml_encode(self::getArtworks(), 'artistique'));

        $xsl = new \DOMDocument;
        $xsl->load(resource_path('xml/artworks.xsl'));

        $proc = new \XSLTProcessor;
        $proc->importStyleSheet($xsl);

        return $proc->transformToXML($xml);
    }

    public function showArtistsXSLT() {
        $xml = new \DOMDocument;
        $xml->loadXML(xml_encode(self::getArtists(), 'artistique'));

        $xsl = new \DOMDocument;
        $xsl->load(resource_path('xml/artists.xsl'));

        $proc = new \XSLTProcessor;
        $proc->importStyleSheet($xsl);

        return $proc->transformToXML($xml);
    }

    public function showCustomersXSLT() {
        $xml = new \DOMDocument;
        $xml->loadXML(xml_encode(self::getCustomers(), 'artistique'));

        $xsl = new \DOMDocument;
        $xsl->load(resource_path('xml/customers.xsl'));

        $proc = new \XSLTProcessor;
        $proc->importStyleSheet($xsl);

        return $proc->transformToXML($xml);
    }

    public function showWishlistXSLT() {
        if (!auth()->user()) {
            return abort(404);
        }
        if (!auth()->user()->isCustomer()) {
            return abort(404);
        }

        $xml = new \DOMDocument;
        $xml->loadXML(xml_encode(self::getWishlist(), 'artistique'));

        $xsl = new \DOMDocument;
        $xsl->load(resource_path('xml/wishlist.xsl'));

        $proc = new \XSLTProcessor;
        $proc->importStyleSheet($xsl);

        return $proc->transformToXML($xml);
    }

    public function insertArtwork($file) {
        try {
            $xml = new \SimpleXMLElement(file_get_contents($file));
        } catch (Exception $e) {
            return false;
        }

        $count = 0;

        $xp = '//artwork';
        $artworksArray = $xml->xpath($xp) ?? [];

        if (!empty($artworksArray)) {
            foreach ($artworksArray as $value) {
                $stripe = new StripeClient('sk_test_51KkOjTJC2EY2ixMBbB9tD5XbwSDydaBRzB7i6gAvlOdbWbfT1dT3KgLYj6LFp6xwq7MsUw6XyPaPHChjdV3tBmqg00NopvLdXY');

                $artwork = new Artwork;
                $artwork->user_id = $value->user_id;
                $artwork->name = $value->name;
                $artwork->price = $value->price;
                $artwork->description = $value->description;
                $artwork->quantity = $value->quantity;
                $artwork->category_id = $value->category_id;
                $artwork->image_url = $value->image_url;

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

                $count++;
            }
        }

        return $count;
    }
    
    public function insertArtist($file) {
        try {
            $xml = new \SimpleXMLElement(file_get_contents($file));
        } catch (Exception $e) {
            return false;
        }

        $count = 0;

        $xp = '//artist';
        $artistsArray = $xml->xpath($xp) ?? [];

        if (!empty($artistsArray)) {
            foreach ($artistsArray as $value) {
                Artist::create([
                    'first_name' => $value->first_name,
                    'last_name' => $value->last_name,
                    'email' => $value->email,
                    'password' => Hash::make($value->password),
                    'type' => 'artist',
                ]);

                $count++;
            }
        }

        return $count;
    }

    public function insertCustomer($file) {
        try {
            $xml = new \SimpleXMLElement(file_get_contents($file));
        } catch (Exception $e) {
            return false;
        }

        $count = 0;

        $xp = '//customer';
        $customersArray = $xml->xpath($xp) ?? [];

        if (!empty($customersArray)) {
            foreach ($customersArray as $value) {
                Customer::create([
                    'first_name' => $value->first_name,
                    'last_name' => $value->last_name,
                    'email' => $value->email,
                    'password' => Hash::make($value->password),
                    'type' => 'customer',
                ]);

                $count++;
            }
        }

        return $count;
    }

    public function insertWishlist($file) {
        try {
            $xml = new \SimpleXMLElement(file_get_contents($file));
        } catch (Exception $e) {
            return false;
        }

        $count = 0;
        $user_id = auth()->user()->id;

        $xp = '//item';
        $wishlistArray = $xml->xpath($xp) ?? [];

        if (!empty($wishlistArray)) {
            foreach ($wishlistArray as $value) {
                Wishlist::create([
                    'artwork_id' => $value->artwork_id,
                    'user_id' => $user_id,
                ]);

                $count++;
            }
        }

        return $count;
    }

}
