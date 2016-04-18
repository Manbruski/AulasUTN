<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Carrera;
class CarrerasController extends Controller
{
    protected $carrera;
    public function __construct(Carrera $carrera){
        $this->carrera = $carrera;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carreras = $this->carrera->orderBy('id')->paginate(7);
        return view('carreras.index', compact('carreras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('carreras.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $carrera         = $this->carrera;
        $carrera->nombre = $request->nombre;
        $carrera->codigo = $request->codigo;
        $carrera->save();
        return redirect('carreras');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $carrera = $this->carrera->find($id);
        return view('carreras.edit', compact('carrera'));
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
        $carrera = $this->carrera->find($id);
        $carrera->nombre = $request->nombre;
        $carrera->codigo = $request->codigo;
        $carrera->save();
        return redirect('carreras');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $carrera = $this->carrera->find($id);
        $carrera->delete();
        return redirect('carreras');
    }
}
