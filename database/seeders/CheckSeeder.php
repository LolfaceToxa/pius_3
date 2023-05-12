<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker;
use Faker\Generator;
use DB;

class CheckSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker\Factory::create();

        for ($i=0; $i < 100; $i++) {
            DB::table("checks")->insert([
                'email'=> $faker->freeEmail(),
            ]);
        }
    }
}
