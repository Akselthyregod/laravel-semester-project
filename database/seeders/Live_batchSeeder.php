<?php

namespace Database\Seeders;

use App\Models\Batch;
use App\Models\Live_batch;
use Faker\Factory;
use Illuminate\Database\Seeder;

class Live_batchSeeder extends Seeder
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
            Live_batch::create([
                'prod_processed_count'=>$faker->numberBetween(150,200),
                'prod_defective_count'=>$faker->numberBetween(20,60),
                'mach_speed'=>$faker->randomFloat(1,0,100),
                'humidity'=>$faker->randomFloat(1,0,100),
                'temperature'=>$faker->randomFloat(1,0,100),
                'vibration'=>$faker->randomFloat(1,0,100)
            ]);
        }
    }
}
