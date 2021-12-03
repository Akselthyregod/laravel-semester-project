<?php

namespace Database\Seeders;

use App\Models\ingredients;
use Illuminate\Database\Seeder;

class ingredientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ingredients::create([
            'product'=>'Barley',
            'amount' => '35000'
        ]);
        ingredients::create([
            'product'=>'Malt',
            'amount' => '35000'
        ]);
        ingredients::create([
            'product'=>'Hops',
            'amount' => '35000'
        ]);
        ingredients::create([
            'product'=>'Wheat',
            'amount' => '35000'
        ]);
        ingredients::create([
            'product'=>'Yeast',
            'amount' => '35000'
        ]);
    }
}
