<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Aula;
use App\Recinto;

class AulasController extends Controller
{
    protected $aula;
    public function __construct(Aula $aula, Recinto $recinto){
        $this->aula = $aula;
        $this->recinto = $recinto;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aulas = $this->aula->with('recinto')->orderBy('id')->paginate(7);
        return view('aulas.index', compact('aulas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $recintos = $this->recinto->all();
        return view('aulas.create', compact('recintos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $aula              = $this->aula;        
        $aula->codigo      = $request->codigo;
        $aula->es_aula     = $request->es_aula;
        $aula->recinto_id  = $request->recinto_id;
        $aula->descripcion = $request->descripcion;
        $aula->observacion = $request->observacion;
        $aula->save();
        return redirect('aulas');
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aula = $this->aula->find($id);        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
