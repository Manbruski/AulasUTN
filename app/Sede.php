<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
    protected $table    = 'sedes';
	  protected $fillable = ['descripcion'];
	  public $timestamps  = false;

    public function sedesAll(){
      return $this->orderBy('descripcion')->get();
    }

    public function recintos() {
      return $this->hasMany('App\Recinto', 'sede_id', 'id');
    }
}
