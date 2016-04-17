<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
	protected $table = 'aulas';
	protected $fillable = ['es_aula', 'codigo', 'recinto_id', 'descripcion', 'observacion'];
	public $timestamps = false;

    public function recinto()
    {
        return $this->hasOne('App\Recinto', 'id', 'recinto_id');
    }

    public function aulasPorSede($sedeId){
    	return $this->join('recintos', 'aulas.recinto_id', '=', "recintos.id")
    				  ->where('recintos.sede_id', $sedeId)
    				  ->orderBy('aulas.id')
    				  ->paginate(7);
     }
}
