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
            'type' => 0
        ]);
        Product::create([

            'description'=>'Wheat',
            'type' => 1
        ]);
        Product::create([

            'description'=>'IPA',
            'type' => 2
        ]);
        Product::create([

            'description'=>'Stout',
            'type' => 3
        ]);
        Product::create([

            'description'=>'Ale',
            'type' => 4
        ]);
        Product::create([

            'description'=>'Alcohol Free',
            'type' => 5
        ]);
    }
}
