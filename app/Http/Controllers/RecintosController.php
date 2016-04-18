<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Recinto;
use App\Sede;
use App\Horario;
class RecintosController extends Controller
{
  protected $recinto, $sede, $horario;

  public function __construct(Recinto $recinto, Sede $sede, Horario $horario) {
    $this->recinto = $recinto;
    $this->sede    = $sede;
    $this->horario = $horario;
  }

  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $recintos = $this->recinto->recintoAll();
    return view('recintos.index', compact('recintos'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    $sedes    = $this->sede->all();
    $horarios = $this->horario->all();
    return view('recintos.create', compact('sedes', 'horarios'));
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    $this->recinto->create($request->all());
    return redirect('recintos');
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id)
  {
    $recinto =$this->recinto->find($id);
    $horarios = $this->horario->all();
    $sedes = $this->sede->all();
    return view('recintos.edit', compact('recinto','horarios', 'sedes'));
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
     $this->recinto->find($id)->update($request->all());
     return redirect('recintos');
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    $this->recinto->find($id)->delete();
    return redirect('recintos');
  }

  public function AulasPorRecintos($id) {
    $recinto = $this->recinto->find($id);
    $aulas   = $recinto->aulas;
    return response()->json(['aulas' => $aulas]);
  }
}
