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
			$table->text('bilagstype');
			$table->integer('bilagssekvens_id')->unsigned();
			$table->foreign('bilagssekvens_id')
				->references('id')->on('bilagssekvenser')
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
