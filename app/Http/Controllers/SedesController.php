<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Sede;

class SedesController extends Controller
{
    protected $sede;
    public function __construct(Sede $sede){
        $this->sede = $sede;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sedes = $this->sede->orderBy('id')->paginate(7);
        return view('sedes.index', compact('sedes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sedes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sede = $this->sede;
        $sede->descripcion = $request->descripcion;
        $sede->save();
        return redirect('sedes');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sede = $this->sede->find($id);
        return view('sedes.edit', compact('sede'));
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
        $sede = $this->sede->find($id);
        $sede->descripcion = $request->descripcion;
        $sede->save();
        return redirect('sedes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sede = $this->sede->find($id);
        $sede->delete();
        return redirect('sedes');
    }

    public function RecintosPorSede($id) {
      $sede = $this->sede->find($id);
      $recintos = $sede->recintos;
      return response()->json(['recintos' => $recintos]);
    }
}
