<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearCita extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cita', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_periodo')->unsigned();
            $table->integer('cedula_paciente')->unsigned();
            $table->integer('cedula_medico')->unsigned();
            $table->date('fecha');
            $table->string('hora');
            $table->string('estado');

            $table->foreign('id_periodo')->references('id')->on('periodo_cita')->onDelete('cascade');
            $table->foreign('cedula_paciente')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('cedula_medico')->references('id')->on('users')->onDelete('cascade');

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
        Schema::drop('cita');
    }
}
