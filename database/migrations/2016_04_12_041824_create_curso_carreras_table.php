<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCursoCarrerasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curso_carreras', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('curso_id');
            $table->integer('carrera_id');
            $table->unique(['curso_id', 'carrera_id']);
            $table->foreign('curso_id')->references('id')->on('cursos');
            $table->foreign('carrera_id')->references('id')->on('carreras');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('curso_carreras');
    }
}
