<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWheelModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_wheel_models', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('wheel_brand_id')->unsigned();
            $table->foreign('wheel_brand_id')->references('id')->on('car_wheel_brands')->onDelete('cascade');
            $table->enum('type', ['RIM', 'TIRE']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('car_wheel_models');
    }
}
