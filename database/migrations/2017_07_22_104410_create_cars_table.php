<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_cars', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('modification_id')->unsigned();
            $table->integer('owner_id')->unsigned();
            $table->boolean('verified')->default(0);
            $table->foreign('modification_id')->references('id')->on('car_modifications')->onDelete('cascade');
            $table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();

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
        Schema::dropIfExists('car_cars');
    }
}
