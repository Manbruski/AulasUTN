<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recinto extends Model
{
    protected $table = 'recintos';
	protected $fillable = ['nombre', 'direccion', 'sede_id', 'horario_id'];
	public $timestamps = false;
}
