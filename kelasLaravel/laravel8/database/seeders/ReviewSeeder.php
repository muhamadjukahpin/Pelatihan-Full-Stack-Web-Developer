<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        foreach (range(1, 25) as  $index) {
            DB::table('reviews')->insert([
                'product_id' => $index,
                'user_id' => rand(1, 50),
                'start' => rand(1, 5),
                'comment' => $faker->paragraph(5)
            ]);
        }
    }
}
