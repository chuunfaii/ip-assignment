<?php

namespace Database\Seeders;

use App\Models\Artist;
use App\Models\Customer;
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
    }
}
