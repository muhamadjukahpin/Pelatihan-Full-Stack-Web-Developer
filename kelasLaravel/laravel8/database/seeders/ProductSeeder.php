<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        foreach (range(1, 25) as $index) {
            DB::table('products')->insert([
                'code' => $faker->unique()->randomNumber(9),
                'name' => 'Product ' . $index,
                'slug' => 'Product-' . $index . '-' . time(),
                'stock' => $faker->randomNumber(2),
                'varian' => $faker->sentence(1),
                'price' => $faker->randomNumber(9),
                // 'image' => $faker->image(public_path('images/products'), 800, 800, 'product', false),
                'image' => '4-1618817481.jpg',
                'description' => $faker->paragraph(20),
                'created_at' => $faker->dateTimeBetween('-3 years', 'now'),
                'category_id' => rand(1, 5),
                'sub_category_id' => rand(1, 13),
            ]);
        }
    }
}
