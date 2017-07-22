<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_detail_models', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('detail_brand_id')->unsigned();
            $table->foreign('detail_brand_id')->references('id')->on('car_detail_brands')->onDelete('cascade');
            $table->enum('type', ['RIM', 'TIRE']);

            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('car_detail_models');
    }
}
