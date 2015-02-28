<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePosteringsmalTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posteringsmaler', function (Blueprint $table) {

            $table->increments('id');
            $table->text('formel');
            $table->integer('bilagsmal_id')->unsigned();
            $table->integer('kontokode')->nullable();

            $table->foreign('bilagsmal_id')
                ->references('id')->on('bilagsmaler')
                ->onDelete('cascade');

            $table->foreign('kontokode')
                ->references('kontokode')->on('kontoer')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('posteringsmaler');
    }

}
