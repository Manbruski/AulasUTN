<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Curso;
use App\Carrera;
use App\CursoCarrera;
class CursoCarreraController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $cursos_carreras = CursoCarrera::all();
  $cursos = \DB::table('curso_carreras')
  ->join('cursos', 'cursos.id', '=', 'curso_carreras.curso_id')
  ->distinct()
  ->select('cursos.*')
  ->get();
  $carreras = \DB::table('curso_carreras')
  ->join('carreras', 'carreras.id', '=', 'curso_carreras.carrera_id')
  ->distinct()
  ->select('carreras.*')
  ->get();
  return view('cursos_carreras.index',compact('cursos_carreras','cursos', 'carreras'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$cursos = Curso::all();
    	$carreras = Carrera::all();
    	return view('cursos_carreras.create',compact('cursos', 'carreras'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$curso_carrera 			       = new CursoCarrera();
      $curso_carrera->curso_id 	 = $request->curso_id;
    	$curso_carrera->carrera_id  = $request->carrera_id;
      $curso_carrera->save();
    	return redirect('cursos_carreras');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$cursos_carreras = CursoCarrera::find($id);
    	$cursos = Curso::all();
      $carreras = Carrera::all();
    	return view('cursos_carreras.edit', compact('cursos_carreras', 'cursos', 'carreras'));
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
    	$curso_carrera = CursoCarrera::find($id);
      $curso_carrera->curso_id 	 = $request->curso_id;
    	$curso_carrera->carrera_id  = $request->carrera_id;
      $curso_carrera->save();
    	return redirect('cursos_carreras');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	$curso_carrera = CursoCarrera::find($id);
    	$curso_carrera->delete();
    	return redirect('cursos_carreras');
    }
}
