<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_providers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('location_id')->unsigned();
            $table->timestamps();

            $table->engine = 'InnoDB';
        });

        Schema::create('shop_providers_products', function (Blueprint $table) {
            $table->integer('provider_id')->unsigned();
            $table->integer('detail_model_id')->unsigned();
            $table->integer('count')->unsigned()->default(0);
            $table->integer('price')->unsigned()->default(0);

            $table->engine = 'InnoDB';
            $table->primary(['provider_id', 'detail_model_id']);
        });

        Schema::create('shop_providers_locations', function (Blueprint $table) {
            $table->integer('provider_id')->unsigned();
            $table->integer('location_id')->unsigned();

            $table->engine = 'InnoDB';
            $table->primary(['provider_id', 'location_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_providers_products');
        Schema::dropIfExists('shop_providers');
    }
}
