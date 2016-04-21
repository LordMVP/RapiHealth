<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearEspecialidad extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('especialidad', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 60)->unique();
            $table->timestamps();
        });

        Schema::create('user_especialidad', function(Blueprint $table) {
            $table->integer('id')->unsigned();
            $table->integer('id_especialidad')->unsigned();

            $table->foreign('id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_especialidad')->references('id')->on('especialidad')->onDelete('cascade');
            
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
        Schema::drop('especialidad');
    }
}
