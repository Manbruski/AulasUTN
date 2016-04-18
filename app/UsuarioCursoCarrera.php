<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsuarioCursoCarrera extends Model
{
	protected $table = 'usuario_curso_carreras';
	protected $fillable = ['usuario_id','curso_carrera_id'];
	public $timestamps = false;

	public function getAll()
	{
		return $this

		->join('users', 'users.id', '=', 'usuario_curso_carreras.usuario_id')
		->join('curso_carreras', 'curso_carreras.id', '=', 'usuario_curso_carreras.curso_carrera_id')
		->select('users.name AS usuario', 'curso_carreras.curso_id AS curso', 'curso_carreras.carrera_id AS carrera','curso_carreras.carrera_id AS carrera', 'usuario_curso_carreras.*')
		->orderBy('usuario_curso_carreras.id')->paginate(7);
	}
	public function getCursosCarreras()
	{

		return $this->join('cursos', 'cursos.id', '=', 'curso_carreras.curso_id')
		->join('carreras', 'carreras.id', '=', 'curso_carreras.carrera_id')
		->select('cursos.nombre AS curso', 'carreras.nombre AS carrera')
		->get();
	}
}
