<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->integer('konto_id')->unsigned()->nullable();

            $table->foreign('bilagsmal_id')
                ->references('id')->on('bilagsmaler')
                ->onDelete('cascade');

            /*
              $table->foreign('konto_id')
                ->references('id')->on('konto')
                ->onDelete('set null');
            */
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
