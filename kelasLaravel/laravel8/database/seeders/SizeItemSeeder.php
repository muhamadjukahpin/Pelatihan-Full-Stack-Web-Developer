<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SizeItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1, 25) as $index) {
            DB::table('size_items')->insert([
                ['size_id' => rand(1, 7), 'product_id' => $index],
            ]);
        }
    }
}
