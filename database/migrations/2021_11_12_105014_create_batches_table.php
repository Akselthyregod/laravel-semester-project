<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batches', function (Blueprint $table) {
            $table->id(); //batchid
            $table->timestamps();
            $table->unsignedBigInteger("productID");
            $table->foreign("productID")->references("id")->on("Products")->onDelete("cascade");

            $table->unsignedBigInteger("stopID");
            $table->foreign("stopID")->references("id")->on("Stop_Reasons")->onDelete("cascade");




        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('batches');
    }
}
