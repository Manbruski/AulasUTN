<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
	protected $table = 'carreras';
	protected $fillable = ['nombre','codigo'];
	public $timestamps = false;

	public function curso()
	{
		return $this->hasMany('App\Curso');
	}
}
