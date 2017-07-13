<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRimProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rim_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('price')->unsigned();
            $table->integer('rim_model_id')->unsigned();
            $table->foreign('rim_model_id')->references('id')->on('rim_models')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rim_products');
    }
}
