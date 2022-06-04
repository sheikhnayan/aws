<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlashDealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flash_deals', function (Blueprint $table) {
            $table->id();
            $table->integer('sl');
            $table->string('title');
            $table->string('background_color');
            $table->string('text_color');
            $table->string('banner')->nullable();
            $table->string('start_date');
            $table->string('end_date');
            $table->string('page_link')->nullable();
            $table->string('featured')->nullable();
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
        Schema::dropIfExists('flash_deals');
    }
}
