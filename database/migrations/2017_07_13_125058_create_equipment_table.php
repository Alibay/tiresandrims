<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('modification_id')->unsigned();
            $table->integer('rim_id')->unsigned();
            $table->integer('tire_id')->unsigned();
            $table->foreign('modification_id')->references('id')->on('model_modifications')->onDelete('cascade');
            $table->foreign('rim_id')->references('id')->on('rims')->onDelete('cascade');
            $table->foreign('tire_id')->references('id')->on('tires')->onDelete('cascade');
            $table->boolean('from_factory');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipments');
    }
}
