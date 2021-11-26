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
            $table->String("prod_processed_count")->nullable(true);
            $table->String("prod_defective_count")->nullable(true);
            $table->String("mach_speed")->nullable(true);
            $table->String("humidity")->nullable(true);
            $table->String("temperature")->nullable(true);
            $table->String("vibration")->nullable(true);
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
