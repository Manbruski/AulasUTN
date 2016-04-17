<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion');
            $table->dateTime('hora_inicio');
            $table->dateTime('hora_fin');
            $table->integer('periodo_id')->unsigned();
            $table->integer('usuario_id')->unsigned();
            $table->integer('sede_id')->unsigned();
            $table->integer('recinto_id')->unsigned();
            $table->integer('aula_id')->unsigned();
            $table->foreign('periodo_id')->on('periodos')->references('id');
            $table->foreign('usuario_id')->on('users')->references('id');
            $table->foreign('sede_id')->on('sedes')->references('id');
            $table->foreign('recinto_id')->on('recintos')->references('id');
            $table->foreign('aula_id')->on('aulas')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('reservaciones');
    }
}
