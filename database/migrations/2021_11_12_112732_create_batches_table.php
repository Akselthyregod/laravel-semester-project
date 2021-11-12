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
            $table->integer("id"); //batchid
            $table->timestamps();
            $table->UnsignedBigInteger("product_id");
            $table->foreign("product_id")->references("id")->on("products")->onDelete("cascade");

            $table->UnsignedBigInteger("stopID");
            $table->foreign("stopID")->references("id")->on("stop_reasons")->onDelete("cascade");
            $table ->integer("amount");




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
