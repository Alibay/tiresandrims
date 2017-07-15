<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_rims', function (Blueprint $table) {
            $table->increments('id');
            $table->float('width', 8, 1)->unsigned();
            // Тип кромки обода
            $table->enum('flange', ['J', 'JJ', 'JK', 'K', 'B', 'D', 'P'])->nullable();
            $table->float('diameter', 8, 1);
            // вылет
            $table->integer('et');
            $table->float('hub_diameter', 8, 1);
            // количество крепежных отверстий (разболтовка)
            $table->integer('mounting_hole')->unsigned();
            // диаметр разболтовки
            $table->float('pcd', 8, 1);
            $table->float('xfactor', 8, 1)->default(0);
            $table->enum('symmetry', ['S', 'A'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('car_rims');
    }
}
