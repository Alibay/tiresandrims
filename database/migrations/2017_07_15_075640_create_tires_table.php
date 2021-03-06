<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTiresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_tires', function (Blueprint $table) {
            $table->increments('id');
            $table->float('width', 8, 1)->unsigned();
            $table->float('height', 8, 1)->unsigned();
            $table->float('radius', 8, 1)->unsigned();
            $table->enum('season', ['WINTER', 'SUMMER', 'ALL']);
            $table->boolean('xl')->default(0);
            $table->boolean('fr')->default(0);
            $table->boolean('zr')->default(0);
            $table->boolean('run_flat')->default(0);
            $table->boolean('thorns')->default(0);

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
        Schema::dropIfExists('car_tires');
    }
}
