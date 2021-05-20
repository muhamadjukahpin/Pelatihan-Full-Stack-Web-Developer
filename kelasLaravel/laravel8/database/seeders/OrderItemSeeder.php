<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1, 25) as $index) {
            DB::table('order_item')->insert([
                'order_id' => $index,
                'product_id' => $index,
                'qty' => rand(1, 25),
            ]);
        }
    }
}
