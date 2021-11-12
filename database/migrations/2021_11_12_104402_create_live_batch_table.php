<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLiveBatchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('live_batch', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer("ProdProcessedCount");
            $table->integer("ProdDefectiveCount");
            $table->float("MachSpeed");
            $table->float("Humidity");
            $table->float("Temperature");
            $table->float("Vibration");
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
