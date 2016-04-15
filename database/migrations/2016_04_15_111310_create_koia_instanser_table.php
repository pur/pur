<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKoiaInstanserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('koia_instanser', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('a', 10, 3);
            $table->decimal('b');
            $table->decimal('c');
            $table->decimal('d');
            $table->decimal('m');
            $table->decimal('n');
            $table->decimal('q');
            $table->integer('kapasitet');
            $table->integer('bruker_id')->unsigned();
            $table->integer('oppgave_id');
            $table->integer('datasett_id');

            $table->foreign('bruker_id')
                ->references('id')->on('brukere')
                ->onDelete('cascade'); // Instanser slettes hvis eieren slettes
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('koia_instanser');
    }
}
