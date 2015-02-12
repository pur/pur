<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOppgaveTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('oppgave', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->integer('innlegger_id')->unsigned()->nullable();
			$table->foreign('innlegger_id')
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
		Schema::drop('oppgave');
	}

}
