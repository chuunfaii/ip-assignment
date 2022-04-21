<?php

// Author:  Lee Jun Xian

namespace Database\Seeders;

use App\Models\Artwork;
use Faker\Factory;
use Stripe\StripeClient;
use Illuminate\Database\Seeder;

class ArtworkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stripe = new StripeClient('sk_test_51KkOjTJC2EY2ixMBbB9tD5XbwSDydaBRzB7i6gAvlOdbWbfT1dT3KgLYj6LFp6xwq7MsUw6XyPaPHChjdV3tBmqg00NopvLdXY');
        $faker = Factory::create();
        $current_num = 0;

        // Paintings
        for ($i = 1; $i <= 7; $i++) {
            $current_num = $i;

            $artwork = new Artwork();

            $artwork->name = 'Painting ' . $i;
            $artwork->quantity = rand(10, 50);
            $artwork->price = rand(15000, 150000);
            $artwork->description = $faker->text(100);
            $artwork->image_url = 'artwork-' . $i . '.jpg';
            $artwork->user_id = rand(6, 10);
            $artwork->category_id = 1;

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
        }

        // Photography
        for ($i = 1; $i <= 7; $i++) {
            $current_num++;

            $artwork = new Artwork();

            $artwork->name = 'Photography ' . $i;
            $artwork->quantity = rand(10, 50);
            $artwork->price = rand(15000, 150000);
            $artwork->description = $faker->text(100);
            $artwork->image_url = 'artwork-' . $current_num . '.jpg';
            $artwork->user_id = rand(6, 10);
            $artwork->category_id = 2;

            $stripe_product = $stripe->products->create([
                'name' => $artwork->name,
                'description' => $artwork->description,
                'images' => [
                    $artwork->image_url,
                ],
            ]);

            $stripe_price = $stripe->prices->create([
                'unit_amount' => $artwork->price * 100,
                'currency' => 'usd',
                'product' => $stripe_product->id,
            ]);

            $artwork->stripe_product_id = $stripe_product->id;
            $artwork->stripe_price_id = $stripe_price->id;

            $artwork->save();
        }

        // Drawings
        for ($i = 1; $i <= 7; $i++) {
            $current_num++;

            $artwork = new Artwork();

            $artwork->name = 'Drawing ' . $i;
            $artwork->quantity = rand(10, 50);
            $artwork->price = rand(15000, 150000);
            $artwork->description = $faker->text(100);
            $artwork->image_url = 'artwork-' . $current_num . '.jpg';
            $artwork->user_id = rand(6, 10);
            $artwork->category_id = 4;

            $stripe_product = $stripe->products->create([
                'name' => $artwork->name,
                'description' => $artwork->description,
                'images' => [
                    $artwork->image_url,
                ],
            ]);

            $stripe_price = $stripe->prices->create([
                'unit_amount' => $artwork->price * 100,
                'currency' => 'usd',
                'product' => $stripe_product->id,
            ]);

            $artwork->stripe_product_id = $stripe_product->id;
            $artwork->stripe_price_id = $stripe_price->id;

            $artwork->save();
        }

        // Sculpture
        for ($i = 1; $i <= 7; $i++) {
            $current_num++;

            $artwork = new Artwork();

            $artwork->name = 'Sculpture ' . $i;
            $artwork->quantity = rand(10, 50);
            $artwork->price = rand(15000, 150000);
            $artwork->description = $faker->text(100);
            $artwork->image_url = 'artwork-' . $current_num . '.jpg';
            $artwork->user_id = rand(6, 10);
            $artwork->category_id = 4;

            $stripe_product = $stripe->products->create([
                'name' => $artwork->name,
                'description' => $artwork->description,
                'images' => [
                    $artwork->image_url,
                ],
            ]);

            $stripe_price = $stripe->prices->create([
                'unit_amount' => $artwork->price * 100,
                'currency' => 'usd',
                'product' => $stripe_product->id,
            ]);

            $artwork->stripe_product_id = $stripe_product->id;
            $artwork->stripe_price_id = $stripe_price->id;

            $artwork->save();
        }
    }
}
