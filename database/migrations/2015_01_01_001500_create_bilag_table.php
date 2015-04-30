<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBilagTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bilag', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nr_i_besvarelse')->unsigned();
            $table->integer('bilagssekvens_id')->unsigned();
            $table->integer('bilagsmal_id')->unsigned();

            $table->foreign('bilagssekvens_id')
                ->references('id')->on('bilagssekvenser')
                ->onDelete('cascade'); // Et bilag slettes hvis bilagssekvensen den inngår i slettes

            $table->foreign('bilagsmal_id')
                ->references('id')->on('bilagsmaler')
                ->onDelete('restrict'); // Bilagsmaler med bilag kan ikke slettes
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bilag');
    }

}
