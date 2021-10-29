<?php

namespace Database\Seeders;

use App\Models\Java_test;
use Faker\Factory;
use Illuminate\Database\Seeder;

class JavaTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        for ($i = 0; $i <10; $i++){
            Java_test::create([
                'tests' => $faker->sentence
            ]);
        }


    }
}
