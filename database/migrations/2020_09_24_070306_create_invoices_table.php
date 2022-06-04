<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_id');
            $table->bigInteger('delivery_id')->unsigned();
            $table->foreign('delivery_id')->references('id')->on('delivery_infos');
            $table->bigInteger('guest_id')->unsigned();
            $table->foreign('guest_id')->references('id')->on('guest');
            $table->string('coupon_id');
            $table->string('delivery_charge');
            $table->string('payment_type');
            $table->string('mobile_acc');
            $table->string('trans_id');
            $table->string('discount');
            $table->string('sub_total');
            $table->string('status');
            $table->string('grand_total');
            $table->string('session_id');
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
        Schema::dropIfExists('invoices');
    }
}
