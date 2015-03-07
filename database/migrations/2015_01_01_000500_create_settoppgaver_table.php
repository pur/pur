<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettoppgaverTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('settoppgaver', function (Blueprint $table) {
            $table->integer('oppgavesett_id')->unsigned();
            $table->integer('oppgave_id')->unsigned();

            $table->primary(['oppgavesett_id', 'oppgave_id']);

            $table->foreign('oppgavesett_id')
                ->references('id')->on('oppgavesett')
                ->onDelete('cascade');

            $table->foreign('oppgave_id')
                ->references('id')->on('oppgaver')
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
		Schema::drop('settoppgaver');
	}

}
