<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Aula;
use App\Recinto;
use App\Sede;

class AulasController extends Controller
{
    protected $aula;
    protected $recinto;
    protected $sede;
    public function __construct(Aula $aula, Recinto $recinto, Sede $sede){
        $this->aula = $aula;
        $this->recinto = $recinto;
        $this->sede = $sede;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->isJson()) {
            $aulas = $this->aula->aulasPorSede($request['sedeId']);
            return response()->json(['aulas' => $aulas]);
        }
        

        $sedes = $this->sede->all();
        return view('aulas.index', compact('sedes'));
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
        $request['es_aula'] = $request->input('es_aula') === 'on';
        $this->aula->create($request->all());
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
        $recintos = $this->recinto->all();
        $aula = $this->aula->with('recinto')->find($id); 
        return View('aulas.edit', compact('aula', 'recintos'));       
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
        $request['es_aula'] = $request->input('es_aula') === 'on';
        $this->aula->create($request->all());
        return redirect('aulas');
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
