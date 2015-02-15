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
			$table->timestamps();
			$table->integer('brukere_id')->unsigned()->nullable();
			$table->foreign('brukere_id')
				->references('id')->on('users')
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
