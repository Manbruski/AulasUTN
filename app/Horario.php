<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $table = 'horarios';
	protected $fillable = ['nombre','hora_inicio', 'hora_fin'];
	public $timestamps = false;
}
