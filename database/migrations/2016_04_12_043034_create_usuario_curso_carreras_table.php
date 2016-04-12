<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioCursoCarrerasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario_curso_carreras', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('usuario_id');
            $table->integer('curso_carrera_id');    
            $table->unique(['usuario_id', 'curso_carrera_id']);
            $table->foreign('usuario_id')->references('id')->on('users');
            $table->foreign('curso_carrera_id')->references('id')->on('curso_carreras');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('usuario_curso_carreras');
    }
}
