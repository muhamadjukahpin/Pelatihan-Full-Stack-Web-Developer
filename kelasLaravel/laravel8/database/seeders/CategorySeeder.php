<?php

namespace Database\Seeders;

use Doctrine\DBAL\Schema\Index;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['name' => 'Man Wear'],
            ['name' => 'Woman Wear'],
            ['name' => 'Children'],
            ['name' => 'Bags & Purses'],
            ['name' => 'Eyewear'],
            ['name' => 'Footwear'],
            ['name' => 'Shoes'],
        ]);
    }
}
