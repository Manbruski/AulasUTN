<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\UsuarioCursoCarrera;
use App\CursoCarrera;
use App\Curso;
use App\Carrera;

class UsuarioCursoCarrerasController extends Controller
{
    protected $user, $cursocarrera, $uccarrera;
    public function __construct(User $user, CursoCarrera $cursocarrera, UsuarioCursoCarrera $uccarrera)
    {
        $this->user = $user;
        $this->cursocarrera = $cursocarrera;
        $this->uccarrera = $uccarrera;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asignaciones   = $this->uccarrera->getAll();
        $curso_carreras = $this->cursocarrera->cursoCarrerasAll();

        return view('asignaciones.index', compact('asignaciones','curso_carreras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $profesores = $this->user->getTeachers();
      $curso_carreras = $this->cursocarrera->cursoCarrerasAll();
      return view('asignaciones.create', compact('profesores','curso_carreras'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $uccarrera = $this->uccarrera;
      $uccarrera->usuario_id = $request->usuario_id;
      $uccarrera->curso_carrera_id  = $request->curso_carrera_id;
      $uccarrera->save();
      return redirect('asignaciones');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
  $uccarrera = $this->uccarrera->find($id);
  $profesores = $this->user->getTeachers();
  $curso_carreras = $this->cursocarrera->cursoCarrerasAll();
  return view('asignaciones.create', compact('profesores','curso_carreras','uccarrera'));

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
      $uccarrera = $this->uccarrera->find($id);
      $uccarrera->usuario_id = $request->usuario_id;
      $uccarrera->curso_carrera_id  = $request->curso_carrera_id;
      $uccarrera->save();
      return redirect('asignaciones');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $uccarrera = $this->uccarrera->find($id);
        $uccarrera->delete();
        return redirect('asignaciones');

    }
}
