<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAulasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aulas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo');
            $table->boolean('es_aula');
            $table->string('descripcion');
            $table->string('observacion');
            $table->integer('recinto_id');
            $table->foreign('recinto_id')->references('id')->on('recintos');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('aulas');
    }
}
