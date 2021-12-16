<?php

namespace Database\Seeders;

use App\Models\states;
use Illuminate\Database\Seeder;

class statesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        states::create([
            //id = 0
            'state' => 'Deactivated',
            'value' => 0
        ]);
        states::create([
            //id = 1
            'state' => 'Clearing',
            'value' => 1
        ]);
        states::create([
            //id = 2
            'state' => 'Stopped',
            'value' => 2
        ]);
        states::create([
            //id = 3
            'state' => 'Starting',
            'value' => 3
        ]);
        states::create([
            //id = 4
            'state' => 'Idle',
            'value' => 4
        ]);
        states::create([
            //id = 5
            'state' => 'Suspended',
            'value' => 5
        ]);
        states::create([
            //id = 6
            'state' => 'Execute',
            'value' => 6
        ]);
        states::create([
            //id = 7
            'state' => 'Stopping',
            'value' => 7
        ]);
        states::create([
            //id = 8
            'state' => 'Aborting',
            'value' => 8
        ]);
        states::create([
            //id = 9
            'state' => 'Aborted',
            'value' => 9
        ]);
        states::create([
            //id = 10
            'state' => 'Holding',
            'value' => 10
        ]);
        states::create([
            //id = 11
            'state' => 'Held',
            'value' => 11
        ]);

        states::create([
            //id = 15
            'state' => 'Resetting',
            'value' => 15
        ]);
        states::create([
            //id = 16
            'state' => 'Completing',
            'value' => 16
        ]);
        states::create([
            //id = 17
            'state' => 'Complete',
            'value' => 17
        ]);
        states::create([
            //id = 18
            'state' => 'Deactivating',
            'value' => 18
        ]);
        states::create([
            //id = 19
            'state' => 'Activating',
            'value' => 19
        ]);

    }
}
