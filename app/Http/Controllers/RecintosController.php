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
    //
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    //
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($id)
  {

  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id)
  {
    //
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
    
  }

  public function AulasPorRecintos($id) {
    $recinto = $this->recinto->find($id);
    $aulas   = $recinto->aulas;
    return response()->json(['aulas' => $aulas]);
  }
}
