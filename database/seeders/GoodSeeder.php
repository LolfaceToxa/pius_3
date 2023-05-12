<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker;
use Faker\Generator;
use DB;

class GoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    
    public function run(): void
    {
        $faker = Faker\Factory::create();

        for ($i=0; $i < 100; $i++) {
            DB::table("goods")->insert([
                'name' => $faker->word,
                'price' => $faker->numberBetween(1200, 500000),
                'number' => $faker->numberBetween(30, 250),
                'card_id'=> $faker->numberBetween(1, 50),
            ]);
        }
    }
}
