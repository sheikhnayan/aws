<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrentOrderInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('current_order_infos', function (Blueprint $table) {
            $table->id();
             $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('address');
            $table->string('phone');
            $table->bigInteger('district_id')->unsigned();
            $table->foreign('district_id')->references('id')->on('disctricts');
            $table->bigInteger('thana_id')->unsigned();
            $table->foreign('thana_id')->references('id')->on('thanas');
            $table->string('payment_type');
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
        Schema::dropIfExists('current_order_infos');
    }
}
