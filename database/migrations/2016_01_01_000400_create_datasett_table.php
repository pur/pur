<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatasettTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('koia_datasett', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('a_min', 10, 3);
            $table->decimal('a_maks', 10, 3);
            $table->decimal('a_intervall', 10, 3);
            $table->decimal('b_min');
            $table->decimal('b_maks');
            $table->decimal('b_intervall');
            $table->decimal('c_min');
            $table->decimal('c_maks');
            $table->decimal('c_intervall');
            $table->decimal('d_min');
            $table->decimal('d_maks');
            $table->decimal('d_intervall');
            $table->decimal('m_min');
            $table->decimal('m_maks');
            $table->decimal('m_intervall');
            $table->decimal('n_min');
            $table->decimal('n_maks');
            $table->decimal('n_intervall');
            $table->decimal('q_min');
            $table->decimal('q_maks');
            $table->decimal('q_intervall');
            $table->integer('kapasitet');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('koia_datasett');
    }
}
