<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sizes')->insert([
            ['size' => 'XS'],
            ['size' => 'S'],
            ['size' => 'M'],
            ['size' => 'L'],
            ['size' => 'XL'],
            ['size' => 'XXL'],
            ['size' => 'XXXL'],
            ['size' => 32],
            ['size' => 34],
            ['size' => 36],
            ['size' => 38],
            ['size' => 40],
            ['size' => 42],
            ['size' => 44],
            ['size' => 46],
        ]);
    }
}
