<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BatchReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batch_report', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('productID')->nullable();
            $table->string("prod_processed_count");
            $table->string("prod_defective_count");
            $table->string("mach_speed");
            $table->string("humidity");
            $table->string("temperature");
            $table->string("vibration");
            $table->integer('batchID');
            //change to string

            $table->foreign('productID')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
