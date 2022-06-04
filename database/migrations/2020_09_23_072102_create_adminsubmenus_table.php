<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsubmenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adminsubmenu', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('mainmenuId')->unsigned();
            $table->foreign('mainmenuId')->references('id')->on('adminmainmenu');
            $table->string('submenuname');
            $table->integer('serialno');
            $table->string('routeName');
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
        Schema::dropIfExists('adminsubmenu');
    }
}
