<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRimModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rim_models', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('manufacturer_id')->unsigned();
            $table->integer('rim_id')->unsigned();
            $table->foreign('manufacturer_id')->references('id')->on('manufacturers')->onDelete('cascade');
            $table->foreign('rim_id')->references('id')->on('rims')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rim_models');
    }
}
