<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBilagsmalerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bilagsmaler', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('nr_i_sekvens')->unsigned();
			$table->integer('belopsformel');
			$table->text('bilagstype');
			$table->text('infotekst');
			$table->integer('bilagsmalsekvens_id')->unsigned();

			$table->foreign('bilagsmalsekvens_id')
				->references('id')->on('bilagsmalsekvenser')
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
		Schema::drop('bilagsmaler');
	}
}
