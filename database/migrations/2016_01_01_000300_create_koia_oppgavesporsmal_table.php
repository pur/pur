<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKoiaOppgavesporsmalTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('koia_oppgavesporsmal', function (Blueprint $table) {
			$table->integer('oppgave_id')->unsigned();
			$table->integer('sporsmal_id')->unsigned();

			$table->primary(['oppgave_id', 'sporsmal_id']);

			$table->foreign('oppgave_id')
                ->references('id')->on('koia_oppgaver')
                ->onDelete('cascade');

			$table->foreign('sporsmal_id')
				->references('id')->on('koia_sporsmal')
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
		Schema::drop('koia_oppgavesporsmal');
	}

}
