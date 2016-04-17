<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Perfil;
class PerfilesController extends Controller
{
    protected $perfil;
    public function __construct(Perfil $perfil){
        $this->perfil = $perfil; 
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perfiles = $this->perfil->orderBy('id')->paginate(7);
        return view('perfiles.index', compact('perfiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('perfiles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $perfil         = $this->perfil;        
        $perfil->nombre = $request->nombre;
        $perfil->save();
        return redirect('perfiles');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $perfil = $this->perfil->find($id);
        return view('perfiles.edit', compact('perfil'));
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
        $perfil = $this->perfil->find($id);
        $perfil->nombre = $request->nombre;
        $perfil->save();
        return redirect('perfiles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $perfil = $this->perfil->find($id);
        $perfil->delete();
        return redirect('perfiles');
    }
}
