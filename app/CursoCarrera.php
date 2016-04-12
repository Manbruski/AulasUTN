<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CursoCarrera extends Model
{
	protected $table = 'curso_carreras';
	protected $fillable = ['curso_id','carrera_id'];
	public $timestamps = false;
}
