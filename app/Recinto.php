<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Recinto extends Model
{
	protected $table = 'recintos';
	protected $fillable = ['nombre', 'direccion', 'sede_id', 'horario_id'];
	public $timestamps = false;

	public function aula()
	{
		return $this->hasOne('App\Aula');
	}

	public function aulas() {
		return $this->hasMany('App\Aula', 'recinto_id', 'id');
	}
	public function recintoAll()
	{
		return $this->join('horarios', 'horarios.id', '=', 'recintos.horario_id')
		->join('sedes', 'sedes.id', '=', 'recintos.sede_id')
		->select('horarios.nombre AS horario', 'sedes.descripcion AS sede', 'recintos.*')
		->orderBy('recintos.id')->paginate(7);		
	}
}
