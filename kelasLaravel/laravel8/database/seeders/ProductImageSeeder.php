<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1, 25) as $index) {
            DB::table('product_images')->insert([
                'product_id' => $index,
                'image' => '1-1618929070.jpg'
            ]);
        }
    }
}
