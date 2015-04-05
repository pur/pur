<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBilagsmalsekvensVarTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bilagsmalsekvens_var', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('navn');
			$table->char('tegn_i_formel', 1);
			$table->decimal('verdi_min');
			$table->decimal('verdi_maks');
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
		Schema::drop('bilagsmalsekvens_var');
	}

}
