<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePosteringsmalerTable extends Migration
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
            $table->integer('kontokode')->default(0);

            $table->foreign('bilagsmal_id')
                ->references('id')->on('bilagsmaler')
                ->onDelete('cascade');

            $table->foreign('kontokode')
                ->references('kontokode')->on('kontoer')
                ->onDelete('restrict');
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
