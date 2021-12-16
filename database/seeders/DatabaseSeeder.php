<?php

namespace Database\Seeders;

use App\Models\Batch;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        $this->call(JavaTestSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(Stop_reasonSeeder::class);
        $this->call(BatchSeeder::class);
        $this->call(Live_batchSeeder::class);
        $this->call(IngredientsSeeder::class);
        $this->call(newBatchSeeder::class);
        $this->call(statesSeeder::class);
    }
}
