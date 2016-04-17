<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservacion extends Model
{
    protected $table    = 'reservaciones';
    protected $hidden   = ['id'];
    protected $fillable = ['descripcion', 'hora_inicio', 'hora_fin', 'periodo_id',
                           'usuario_id', 'sede_id', 'recinto_id', 'aula_id'];
    public $timestamps  = false;


}
