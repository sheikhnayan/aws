<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfferSetupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offer_setups', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('item_id')->unsigned();
            $table->foreign('item_id')->references('id')->on('product_item');
            $table->bigInteger('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('product_category');
            $table->bigInteger('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('product_productinfo');
            $table->integer('type');
            $table->dateTime('start_date_time');
            $table->dateTime('end_date_time');
            $table->integer('status');
            $table->integer('admin_id');
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
        Schema::dropIfExists('offer_setups');
    }
}
