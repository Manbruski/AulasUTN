<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
  protected $table = 'periodos';
	protected $fillable = ['nombre', 'fecha_inicio', 'fecha_fin'];
	public $timestamps = false;

  public function periodosAll(){
    return $this->orderBy('nombre')->get();
  }
}
