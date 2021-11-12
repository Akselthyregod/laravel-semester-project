<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLiveBatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('live_batches', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer("prod_processed_count");
            $table->integer("prod_defective_count");
            $table->float("mach_speed");
            $table->float("humidity");
            $table->float("temperature");
            $table->float("vibration");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('live_batch');
    }
}
