<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsuarioCursoCarrera extends Model
{
	protected $table = 'usuario_curso_carreras';
	protected $fillable = ['usuario_id','curso_id','carrera_id'];
	public $timestamps = false;
}
