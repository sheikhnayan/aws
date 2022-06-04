<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_productinfo', function (Blueprint $table) {
            $table->id();
            $table->string('product_id');
            $table->bigInteger('item_id')->unsigned();
            $table->foreign('item_id')->references('id')->on('product_item');
            $table->bigInteger('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('product_category');
            $table->bigInteger('subcategory_id')->unsigned();
            $table->foreign('subcategory_id')->references('id')->on('product_subcategory');
            $table->bigInteger('brand_id')->unsigned();
            $table->foreign('brand_id')->references('id')->on('product_company');
            $table->string('product_name');
            $table->string('product_name_bangla');
            $table->integer('measurement_type');
            $table->double('purchase_price',11,2);
            $table->double('sale_price',11,2);
            $table->double('discount_price',11,2);
            $table->double('discount_per',11,2);
            $table->double('current_price',11,2);
            $table->string('old_price');
            $table->integer('min_qunt');
            $table->mediumText('product_us');
            $table->longText('product_details');
            $table->longText('condition');
            $table->string('image');
            $table->string('barcode');
            $table->string('shelf_no');
            $table->string('branch_id');
            $table->integer('admin_id');
            $table->integer('seller_id');
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
        Schema::dropIfExists('product_productinfo');
    }
}
