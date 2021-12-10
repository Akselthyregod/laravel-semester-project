<?php

namespace Database\Seeders;

use App\Models\Ingredients;
use Faker\Factory;
use Illuminate\Database\Seeder;
use phpDocumentor\Reflection\Types\Float_;

class IngredientSeeder extends Seeder
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
            'amount'=>'20'
        ]);

        Ingredients::create([

            'product'=>'Hops',
            'amount'=>'100'
        ]);

        Ingredients::create([

            'product'=>'Malt',
            'amount'=>'1000'
        ]);

        Ingredients::create([

            'product'=>'Wheat',
            'amount'=>'20000'
        ]);

        Ingredients::create([

            'product'=>'Yeast',
            'amount'=>'35000'
        ]);

        /*
        $faker = Factory::create();

        for ($i=0;$i<6;$i++){
            Ingredients::create([
                'product'=>'Product',
                'amount'=>$faker->randomFloat(1,0,35000)
            ]);
        }
        */
    }
}
