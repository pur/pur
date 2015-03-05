<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOppgavesettTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oppgavesett', function (Blueprint $table) {
            $table->increments('id');
            $table->text('beskrivelse');
            $table->timestamp('tid_opprettet');
            $table->timestamp('tid_endret');
            $table->timestamp('tid_publisert');
            $table->timestamp('tid_aapent');
            $table->timestamp('tid_lukket');
            $table->integer('bruker_id')->unsigned()->nullable();
            $table->foreign('bruker_id')
                ->references('id')->on('brukere')
                ->onDelete('cascade');
        });

        Schema::create('settoppgaver', function (Blueprint $table) {
            $table->integer('oppgavesett_id')->unsigned();
            $table->integer('oppgave_id')->unsigned();

            $table->primary(['oppgavesett_id', 'oppgave_id']);

            $table->foreign('oppgavesett_id')
                ->references('id')->on('oppgavesett')
                ->onDelete('cascade');

            $table->foreign('oppgave_id')
                ->references('id')->on('oppgaver')
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
        Schema::drop('settoppgaver');
        Schema::drop('oppgavesett');
    }

}
