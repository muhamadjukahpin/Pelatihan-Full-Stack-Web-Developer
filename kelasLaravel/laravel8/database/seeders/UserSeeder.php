<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'no_HP' => '089942342',
            'image' => 'default.jpg',
            'address' => 'Jln.raya sdsfsdfa',
            'province_id' => 3,
            'city_id' => 455,
            'password' => Hash::make('password'),
            'level' => 'ADMIN',
            'created_at' => now(),
        ]);
        $faker = Faker::create('id_ID');
        foreach (range(1, 99) as $index) {
            DB::table('users')->insert([
                'name' => $faker->name(),
                'email' => $faker->email(),
                'no_HP' => '0980129381',
                'image' => 'default.jpg',
                'address' => $faker->streetAddress(),
                'province_id' => 3,
                'city_id' => 455,
                'password' => Hash::make('password'),
                'created_at' => $faker->dateTimeBetween('-3 years', 'now'),
            ]);
        }
    }
}
