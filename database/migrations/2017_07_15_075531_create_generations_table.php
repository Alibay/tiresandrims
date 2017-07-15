<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGenerationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_generations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('year_from')->unsigned();
            $table->integer('year_to')->unsigned();
            $table->integer('model_id')->unsigned();
            $table->foreign('model_id')->references('id')->on('car_models')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('car_generations');
    }
}
