<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker;
use Faker\Provider\en_US\Person;
use Faker\Generator;
use DB;

class CardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker\Factory::create();
        for ($i=0; $i < 100; $i++) { 
            DB::table("cards")->insert([
                'user' => $faker->firstNameMale() ,
                'check_id' => $faker->numberBetween(1, 50),
            ]);
        }
    }
}
