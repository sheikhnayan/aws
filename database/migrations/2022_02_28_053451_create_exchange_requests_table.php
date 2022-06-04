<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExchangeRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exchange_requests', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone_number');
            $table->string('email');
            $table->string('order_number');
            $table->text('reason');
            $table->string('return_product_style_number');
            $table->string('return_product_size');
            $table->string('return_product_color');
            $table->string('exchange_product_style_number');
            $table->string('exchange_product_size');
            $table->string('exchange_product_color');
            $table->text('message')->nullable();
            $table->integer('status');
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
        Schema::dropIfExists('exchange_requests');
    }
}
