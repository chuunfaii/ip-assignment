<?php

// Author:  Lee Jun Xian

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::insert([
            ['name' => 'Paintings'],
            ['name' => 'Photography'],
            ['name' => 'Drawings'],
            ['name' => 'Sculpture'],
        ]);
    }
}
