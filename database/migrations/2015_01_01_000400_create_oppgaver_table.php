<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOppgaverTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('oppgaver', function(Blueprint $table)
		{
			$table->increments('id');
            $table->timestamp('tid_opprettet');
            $table->timestamp('tid_endret');
			$table->text('beskrivelse');
            $table->string('moduloppgave_type');
            $table->integer('moduloppgave_id');
			$table->integer('bruker_id')->unsigned()->nullable();

            $table->foreign('bruker_id')
				->references('id')->on('brukere')
				->onDelete('set null');
		});
        // TODO: moduloppgaver bør slettes når oppgaver slettes
    }

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('oppgaver');
	}

}
