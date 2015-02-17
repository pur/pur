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
			$table->text('beskrivelse');
			$table->integer('bruker_id')->unsigned()->nullable();
			$table->foreign('bruker_id')
				->references('id')->on('brukere')
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
		Schema::drop('oppgaver');
	}

}
