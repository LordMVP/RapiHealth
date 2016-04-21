<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTurno extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turno', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_periodo')->unsigned();
            $table->string('estado');
            $table->string('ruta');

            $table->foreign('id_periodo')->references('id')->on('periodo_turno')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('turno');
    }
}
