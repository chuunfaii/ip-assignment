<?php

namespace Database\Seeders;

use App\Models\Artwork;
use Faker\Factory;
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
        $faker = Factory::create();
        $current_num = 0;

        // Paintings
        for ($i = 1; $i <= 7; $i++) {
            $current_num = $i;

            Artwork::create([
                'name' => 'Painting ' . $i,
                'quantity' => rand(10, 50),
                'price' => rand(15000, 150000),
                'description' => $faker->text(),
                'image_url' => 'artwork-' . $i . '.jpg',
                'user_id' => rand(6, 10),
                'category_id' => 1,
            ]);
        }

        // Photography
        for ($i = 1; $i <= 7; $i++) {
            $current_num++;

            Artwork::create([
                'name' => 'Photography ' . $i,
                'quantity' => rand(10, 50),
                'price' => rand(15000, 150000),
                'description' => $faker->text(),
                'image_url' => 'artwork-' . $current_num . '.jpg',
                'user_id' => rand(6, 10),
                'category_id' => 2,
            ]);
        }

        // Drawings
        for ($i = 1; $i <= 7; $i++) {
            $current_num++;

            Artwork::create([
                'name' => 'Drawing ' . $i,
                'quantity' => rand(10, 50),
                'price' => rand(15000, 150000),
                'description' => $faker->text(),
                'image_url' => 'artwork-' . $current_num . '.jpg',
                'user_id' => rand(6, 10),
                'category_id' => 3,
            ]);
        }

        // Sculpture
        for ($i = 1; $i <= 7; $i++) {
            $current_num++;

            Artwork::create([
                'name' => 'Sculpture ' . $i,
                'quantity' => rand(10, 50),
                'price' => rand(15000, 150000),
                'description' => $faker->text(),
                'image_url' => 'artwork-' . $current_num . '.jpg',
                'user_id' => rand(6, 10),
                'category_id' => 4,
            ]);
        }
    }
}
