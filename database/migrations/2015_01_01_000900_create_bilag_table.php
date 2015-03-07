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
            $table->integer('bilagsmal_id')->unsigned();
            $table->integer('nr_i_oppgsett')->unsigned();
            $table->integer('besvarelse_id')->unsigned();

            //$table->primary(['bilagsmal_id', 'sekvensposisjon']);

            $table->foreign('bilagsmal_id')
                ->references('id')->on('bilagsmaler')
                ->onDelete('cascade');

            $table->foreign('besvarelse_id')
                ->references('id')->on('besvarelser')
                ->onDelete('cascade');

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
