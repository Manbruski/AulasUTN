<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CursoCarrera extends Model
{
	protected $table = 'curso_carreras';
	protected $fillable = ['curso_id','carrera_id'];
	public $timestamps = false;

	public function sedesAll(){
		return $this->orderBy('descripcion')->get();
	}

		public function cursoCarrerasAll()
	{
		return $this->join('cursos', 'cursos.id', '=', 'curso_carreras.curso_id')
		->join('carreras', 'carreras.id', '=', 'curso_carreras.carrera_id')
		->select('cursos.nombre AS curso', 'carreras.nombre AS carrera', 'curso_carreras.*')
		->orderBy('curso_carreras.id')->paginate(7);		
	}
	
}
