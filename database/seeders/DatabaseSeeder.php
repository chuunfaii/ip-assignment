<?php

// Author:  Chiam Yee Hang, Lee Chun Fai, Lee Jun Xian & Quah Khai Gene

namespace Database\Seeders;

use App\Models\Artist;
use App\Models\Customer;
use App\Models\Wishlist;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Customer::factory()->count(5)->create();
        Artist::factory()->count(5)->create();
        $this->call(CategorySeeder::class);
        $this->call(ArtworkSeeder::class);
        Wishlist::factory()->count(10)->create();
    }
}
