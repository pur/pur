<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKoiaSporsmalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('koia_sporsmal', function (Blueprint $table) {
            $table->increments('id');
            $table->text('sporsmal');
            $table->text('formel');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('koia_sporsmal');
    }
}
