<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('trains', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->string('schedule', 255)->default('пн-пт');
            $table->timestamps();
        });

        Schema::create('train_station', function(Blueprint $table){
            $table->increments('id');
            $table->integer('train_id')->index()->unsigned();
            $table->integer('station_id')->index()->unsigned();
            $table->time('time')->default('000000');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('trains');
    }
}
