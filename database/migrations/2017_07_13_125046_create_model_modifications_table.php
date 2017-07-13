<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelModificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('model_modifications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('generation_id')->unsigned();
            $table->foreign('generation_id')->references('id')->on('model_generations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('model_modifications');
    }
}
