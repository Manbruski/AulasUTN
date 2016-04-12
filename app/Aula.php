<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    protected $table = 'aulas';
	protected $fillable = ['codigo', 'recinto_id', 'descripcion', 'observacion'];
	public $timestamps = false;
}
