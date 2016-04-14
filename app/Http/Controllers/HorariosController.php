<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Horario;
class HorariosController extends Controller
{
    protected $horario;
    public function __construct(Horario $horario){
        $this->horario = $horario;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $horarios = $this->horario->all();
        return view('horarios.index', compact('horarios'));
    }

}
