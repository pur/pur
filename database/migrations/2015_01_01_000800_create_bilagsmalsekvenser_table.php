<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBilagsmalsekvenserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bilagsmalsekvenser', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('sekvenstype');
            $table->string('motpart');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('bilagsmalsekvenser');
	}

}
