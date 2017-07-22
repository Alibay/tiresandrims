<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->increments('id');
            $table->string('path');
            $table->string('filename');
            $table->integer('parent_id')->unsigned();
            $table->integer('thumb_type')->default(0);
            $table->integer('assign_id')->unsigned();
            $table->enum('assign_type', \App\Image::$assignTypes);
            $table->integer('order')->default(0);
            $table->integer('width')->unsigned();
            $table->integer('height')->unsigned();

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
        Schema::dropIfExists('images');
    }
}
