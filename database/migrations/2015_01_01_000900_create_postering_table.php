<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePosteringTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posteringer', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamp('tid_lagret');
            $table->decimal('belop');
            $table->integer('ant_lagringer');
            $table->boolean('er_fasit');
            $table->integer('bilag_id')->unsigned();
            $table->integer('kontokode');

            $table->foreign('bilag_id')
                ->references('id')->on('bilag')
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
		Schema::drop('posteringer');
	}

}
