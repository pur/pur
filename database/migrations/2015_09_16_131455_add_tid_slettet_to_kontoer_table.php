<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTidSlettetToKontoerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kontoer', function (Blueprint $table) {
            $table->timestamp('tid_slettet')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kontoer', function (Blueprint $table) {
            $table->dropColumn('tid_slettet');
        });
    }
}
