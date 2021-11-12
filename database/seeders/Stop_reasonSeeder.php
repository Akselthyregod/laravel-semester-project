<?php

namespace Database\Seeders;

use App\Models\Stop_reason;
use Illuminate\Database\Seeder;

class Stop_reasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Stop_reason::create([

            'description'=>'Empty inventory'
        ]);
        Stop_reason::create([

            'description'=>'Maintenance'
        ]);
        Stop_reason::create([

            'description'=>'Manual Stop'
        ]);
        Stop_reason::create([

            'description'=>'Motor power loss'
        ]);
        Stop_reason::create([

            'description'=>'Manual abort'
        ]);

    }
}
