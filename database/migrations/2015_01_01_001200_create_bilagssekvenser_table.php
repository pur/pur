<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBilagssekvenserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bilagssekvenser', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('bilagsmalsekvens_id')->unsigned();
            $table->integer('besvarelse_id')->unsigned();

            $table->foreign('bilagsmalsekvens_id')
                ->references('id')->on('bilagsmalsekvenser')
                ->onDelete('restrict');

            $table->foreign('besvarelse_id')
                ->references('id')->on('besvarelser')
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
		Schema::drop('bilagssekvenser');
	}

}
