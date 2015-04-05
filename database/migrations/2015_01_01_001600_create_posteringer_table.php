<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePosteringerTable extends Migration {

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
			$table->timestamp('tid_opprettet');
			$table->timestamp('tid_endret');
            $table->decimal('belop');
            $table->integer('ant_lagringer');
            $table->boolean('er_fasit');
            $table->integer('bilag_id')->unsigned();
            $table->integer('kontokode');

            $table->foreign('bilag_id')
                ->references('id')->on('bilag')
                ->onDelete('cascade');

            $table->foreign('kontokode')
                ->references('kontokode')->on('kontoer')
                ->onDelete('restrict');

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
