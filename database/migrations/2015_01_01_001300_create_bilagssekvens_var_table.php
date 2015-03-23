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
            $table->decimal('verdi_maks');
            $table->integer('bilagsmalsekvens_var_id')->unsigned();
            $table->integer('bilagssekvens_id')->unsigned();

            $table->foreign('bilagsmalsekvens_var_id')
                ->references('id')->on('bilagsmalsekvens_var')
                ->onDelete('restrict');


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
		Schema::drop('bilagssekvens_var');
	}

}
