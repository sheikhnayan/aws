<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinkpioritiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('linkpiority', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('adminid')->unsigned();
            $table->foreign('adminid')->references('id')->on('createadmin');
            $table->bigInteger('mainlinkid')->unsigned();
            $table->foreign('mainlinkid')->references('id')->on('adminmainmenu');
            $table->bigInteger('sublinkid')->unsigned();
            $table->foreign('sublinkid')->references('id')->on('adminsubmenu');
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
        Schema::dropIfExists('linkpiority');
    }
}
