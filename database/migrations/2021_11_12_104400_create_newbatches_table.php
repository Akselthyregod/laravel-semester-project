<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewbatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('newbatches', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->UnsignedBigInteger("product_id");
            $table ->integer("amount");
            $table->integer("speed");
            $table->UnsignedBigInteger("batchID");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('newbatches');
    }
}
