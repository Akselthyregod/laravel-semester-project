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

           'description'=>'Pilsner'
        ]);
        Product::create([

            'description'=>'Wheat'
        ]);
        Product::create([

            'description'=>'IPA'
        ]);
        Product::create([

            'description'=>'Stout'
        ]);
        Product::create([

            'description'=>'Ale'
        ]);
        Product::create([

            'description'=>'Alcohol Free'
        ]);
    }
}
