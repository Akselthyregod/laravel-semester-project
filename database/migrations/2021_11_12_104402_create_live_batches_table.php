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
            $table->unsignedBigInteger('productID')->nullable();
            $table->unsignedBigInteger('stateID')->nullable();
            $table->string("prod_processed_count");
            $table->string("prod_defective_count");
            $table->string("mach_speed");
            $table->string("humidity");
            $table->string("temperature");
            $table->string("vibration");

            //change to string

            $table->foreign('productID')->references('type')->on('products')->onDelete('cascade');
            $table->foreign('stateID')->references('value')->on('states')->onDelete('cascade');
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
