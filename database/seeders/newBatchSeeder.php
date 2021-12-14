<?php

namespace Database\Seeders;

use App\Models\newbatch;
use Faker\Factory;
use Illuminate\Database\Seeder;

class newBatchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        for ($i=0;$i<5;$i++){
            newbatch::create([
                'product_id'=>$faker->numberBetween(0,5),
                'amount'=>$faker->numberBetween(10,1000),
                'speed'=>$faker->numberBetween(10,600)
            ]);
        }
    }
}
