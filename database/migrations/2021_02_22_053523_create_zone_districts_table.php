<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZoneDistrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zone_districts', function (Blueprint $table) {
            $table->id();
             $table->bigInteger('zone_id')->unsigned();
            $table->foreign('zone_id')->references('id')->on('zones');
             $table->bigInteger('district_id')->unsigned();
            $table->foreign('district_id')->references('id')->on('districts');
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
        Schema::dropIfExists('zone_districts');
    }
}
