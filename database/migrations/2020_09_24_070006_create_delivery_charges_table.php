<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_charges', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('district_id')->unsigned();
            $table->foreign('district_id')->references('id')->on('disctricts');
            $table->bigInteger('zone_id')->unsigned();
            $table->foreign('zone_id')->references('id')->on('zones');
            $table->bigInteger('thana_id')->unsigned();
            $table->foreign('thana_id')->references('id')->on('thanas');
            $table->bigInteger('shipping_id')->unsigned();
            $table->foreign('shipping_id')->references('id')->on('shipping_classes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('delivery_charges');
    }
}
