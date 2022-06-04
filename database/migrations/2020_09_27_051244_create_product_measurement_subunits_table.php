<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductMeasurementSubunitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_measurement_subunit', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('measurement_unit_id')->unsigned();
            $table->foreign('measurement_unit_id')->references('id')->on('product_measurement');
            $table->string('sub_unit_name');
            $table->string('sub_unit_data');
            $table->string('admin_id');
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
        Schema::dropIfExists('product_measurement_subunit');
    }
}
