<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBrukereTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('brukere', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('epost')->unique();
			//$table->string('passord', 60);
			$table->string('password', 60);
			$table->string('rolle');
			$table->string('navn');
			$table->rememberToken();
			$table->timestamp('tid_opprettet');
            $table->timestamp('tid_endret');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('brukere');
	}

}
