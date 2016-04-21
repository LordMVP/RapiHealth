<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearHistoria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historia', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cedula_paciente')->unsigned();
            $table->integer('id_cita')->unsigned();
            $table->date('fecha');
            $table->string('observacion');

            $table->primary('id', 'cedula_paciente', 'id_cita');

            $table->foreign('cedula_paciente')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_cita')->references('id')->on('cita')->onDelete('cascade');

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
        Schema::drop('historia');
    }
}
