<?php namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Perfil;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'celular', 'email', 'perfil_id', 'es_docente', 'activo','password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function perfil(){
      return $this->hasOne('App\Perfil', 'id', 'perfil_id');
    }
}
