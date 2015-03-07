<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBesvarelserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('besvarelser', function(Blueprint $table)
		{
            $table->increments('id');
            $table->timestamp('tid_opprettet');
            $table->timestamp('tid_endret');
            $table->timestamp('tid_levert');
            $table->text('kommentar');
            $table->integer('bruker_id')->unsigned()->nullable();
            $table->integer('oppgavesett_id')->unsigned()->nullable();

            $table->foreign('bruker_id')
                ->references('id')->on('brukere')
                ->onDelete('set null');

            $table->foreign('oppgavesett_id')
                ->references('id')->on('oppgavesett')
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
		Schema::drop('besvarelser');
	}

}
