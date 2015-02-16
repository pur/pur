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
			$table->string('epost')->unique();
			$table->string('passord', 60);
			$table->string('rolle');
			$table->rememberToken();
			$table->timestamps();
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
