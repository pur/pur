<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
			$table->string('fornavn');
			$table->string('etternavn');
			// $table->string('epost')->unique();
			// $table->string('passord', 60);
			$table->string('email')->unique();
			$table->string('password', 60);
			$table->string('rolle');
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
