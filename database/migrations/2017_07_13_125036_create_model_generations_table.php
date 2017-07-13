<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelGenerationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('model_generations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('year_from')->unsigned();
            $table->integer('year_to')->unsigned();
            $table->integer('model_id')->unsigned();
            $table->foreign('model_id')->references('id')->on('brand_models')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('model_generations');
    }
}
