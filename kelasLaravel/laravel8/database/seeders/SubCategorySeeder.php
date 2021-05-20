<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sub_categories')->insert([
            [
                'name' => 'Midi Dresses',
                'category_id' => 1,
            ],
            [
                'name' => 'Maxi Dresses',
                'category_id' => 1,
            ],
            [
                'name' => 'Pram Dresses',
                'category_id' => 1,
            ],
            [
                'name' => 'Midi Dresses',
                'category_id' => 2,
            ],
            [
                'name' => 'Maxi Dresses',
                'category_id' => 2,
            ],
            [
                'name' => 'Pram Dresses',
                'category_id' => 2,
            ],
            [
                'name' => 'Little Black Dresses',
                'category_id' => 2,
            ],
            [
                'name' => 'Mini Dresses',
                'category_id' => 2,
            ],
            [
                'name' => 'Sneakers',
                'category_id' => 7,
            ],
            [
                'name' => 'Sandals',
                'category_id' => 7,
            ],
            [
                'name' => 'Formal Shoes',
                'category_id' => 7,
            ],
            [
                'name' => 'Boots',
                'category_id' => 7,
            ],
            [
                'name' => 'Flip FLops',
                'category_id' => 7,
            ],
        ]);
    }
}
