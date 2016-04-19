<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
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
	public function getCursoCarreras($id)
	{
		return DB::select(DB::raw("select usuario_curso_carreras.*,
		cursos.nombre AS curso,
	cursos.id AS curso_id,
	carreras.nombre AS carrera,
	carreras.id AS carrera_id,
	users.name AS usuario
from
	usuario_curso_carreras inner join users
	on users.id = usuario_curso_carreras.usuario_id
	inner join curso_carreras
	on curso_carreras.id = usuario_curso_carreras.curso_carrera_id
	inner join cursos
	on cursos.id = curso_carreras.curso_id
	inner join carreras
	on carreras.id = curso_carreras.carrera_id
	where usuario_curso_carreras.id = $id"
	))[0];
	}
}
