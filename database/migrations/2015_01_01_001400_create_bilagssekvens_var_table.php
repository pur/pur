<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBilagssekvensVarTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bilagssekvens_var', function(Blueprint $table)
		{
			$table->increments('id');
            $table->decimal('verdi');
            $table->integer('bilagsmalsekvens_var_id')->unsigned();
            $table->integer('bilagssekvens_id')->unsigned();

            $table->foreign('bilagsmalsekvens_var_id')
                ->references('id')->on('bilagsmalsekvens_var')
                ->onDelete('restrict'); // Malvariabler med variabler kan ikke slettes

            $table->foreign('bilagssekvens_id')
                ->references('id')->on('bilagssekvenser')
                ->onDelete('cascade'); // Variabler slettes hvis bilagssekvensen de inngår i slettes
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('bilagssekvens_var');
	}

}
