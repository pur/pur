<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOppgavesvarTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('oppgavesvar', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamp('tid_opprettet');
			$table->timestamp('tid_endret');
			$table->text('kommentar');
			$table->string('moduloppgavesvar_type');
			$table->integer('moduloppgavesvar_id');
			$table->integer('oppgave_id')->unsigned();
			$table->integer('besvarelse_id')->unsigned();

            $table->foreign('oppgave_id')
                ->references('id')->on('oppgaver')
                ->onDelete('restrict'); // Oppgaver med oppgavesvar kan ikke slettes

            $table->foreign('besvarelse_id')
                ->references('id')->on('besvarelser')
                ->onDelete('cascade'); // Et oppgavesvar slettes hvis besvarelsen den inngår i slettes
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('oppgavesvar');
	}

}
