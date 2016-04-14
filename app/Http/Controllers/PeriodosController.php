<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Periodo;
class PeriodosController extends Controller
{
    protected $periodo;
    public function __construct(Periodo $periodo){
        $this->periodo = $periodo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periodos = $this->periodo->orderBy('id')->paginate(7);
        return view('periodos.index', compact('periodos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('periodos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $periodo = $this->periodo;
        $periodo->nombre       = $request->nombre;
        $periodo->fecha_inicio = $request->fecha_inicio;
        $periodo->fecha_fin    = $request->fecha_fin;
        $periodo->save();
        return redirect('periodos');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $periodo = $this->periodo->find('id');
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
        $periodo = $this->periodo->find('id');
        $periodo->nombre       = $request->nombre;
        $periodo->fecha_inicio = $request->fecha_inicio;
        $periodo->fecha_fin    = $request->fecha_fin;
        $periodo->save();
        return redirect('periodos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $periodo = $this->periodo->find('id');
        $periodo->delete();
        return redirect('periodos');
    }
}
