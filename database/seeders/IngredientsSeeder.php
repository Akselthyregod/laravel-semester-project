<?php

namespace Database\Seeders;

use App\Models\Ingredients;
use Illuminate\Database\Seeder;

class IngredientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ingredients::create([
            'product'=>'Barley',
            'amount' => 35000.0
        ]);
        Ingredients::create([
            'product'=>'Malt',
            'amount' => 35000.0
        ]);
        Ingredients::create([
            'product'=>'Hops',
            'amount' => 35000.0
        ]);
        Ingredients::create([
            'product'=>'Wheat',
            'amount' => 35000.0
        ]);
        Ingredients::create([
            'product'=>'Yeast',
            'amount' => 35000.0
        ]);
    }
}
