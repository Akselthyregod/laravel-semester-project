<?php

namespace Database\Seeders;

use App\Models\Batch;
use Faker\Factory;
use Illuminate\Database\Seeder;

class BatchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        for ($i=0;$i<20;$i++){
            Batch::create([
                'id'=>$i,
                'stopID'=> $faker->numberBetween(10,14),
                'product_id'=>$faker->numberBetween(10,15),
                'amount'=>$faker->numberBetween(0,200)
            ]);
        }

    }
}
