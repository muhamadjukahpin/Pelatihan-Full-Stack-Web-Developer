<?php

namespace Database\Seeders;

use App\Models\Review;
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
        $this->call([
            ProvinceSeeder::class,
            CitySeeder::class,
            UserSeeder::class,
            CategorySeeder::class,
            SubCategorySeeder::class,
            ProductSeeder::class,
            SizeSeeder::class,
            SizeItemSeeder::class,
            OrderSeeder::class,
            ReviewSeeder::class,
            // OrderItemSeeder::class,
        ]);
    }
}
