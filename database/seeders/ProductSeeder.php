<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([

            'description'=>'Pilsner',
            'type' => 0,
            'optimal_speed' => 99
        ]);
        Product::create([

            'description'=>'Wheat',
            'type' => 1,
            'optimal_speed' => 100
        ]);
        Product::create([

            'description'=>'IPA',
            'type' => 2,
            'optimal_speed' => 101
        ]);
        Product::create([

            'description'=>'Stout',
            'type' => 3,
            'optimal_speed' => 102
        ]);
        Product::create([

            'description'=>'Ale',
            'type' => 4,
            'optimal_speed' => 103
        ]);
        Product::create([

            'description'=>'Alcohol Free',
            'type' => 5,
            'optimal_speed' => 104
        ]);
    }
}
