<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;
use App\User;
use App\Perfil;
use Hash;
use Mail;
class UsuariosController extends Controller
{
    protected $usuario, $perfil;

    public function __construct(User $usuario, Perfil $perfil){
        $this->usuario = $usuario;
        $this->perfil = $perfil;
    }

    protected function validator($data)
    {
        return Validator::make($data, [
            'name'     => 'required|max:255',
            'email'    => 'required|email|max:255|unique:users',//|regex:/(.*)\@utn\.ac\.cr$/i',
            'password' => 'required|min:6|confirmed',
            'celular'  => 'required',
            ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = $this->usuario->with('perfil')->orderBy('id')->paginate(7);
        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $perfiles = $this->perfil->all();
        return view('auth.register', compact('perfiles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $password = str_random(8);
        $request['password'] = $password;
        $request['password_confirmation'] = $password;
        $request['es_docente'] = $request->input('es_docente') === 'on';
        $request['activo'] = $request->input('activo') === 'on';

        $validator = $this->validator($request->all());
        if ($validator->fails()) {
            $this->throwValidationException($request, $validator);
        }

        $this->usuario->create([
            'name'      => $request['name'],
            'email'     => $request['email'],
            'celular'   => $request['celular'],
            'perfil_id' => $request['perfil_id'],
            'es_docente'=> $request['es_docente'],
            'activo'    => $request['activo'],
            'password'  => Hash::make($request['password']),
            ]);

        $data = ['name' => $request->name, 'password'=>$password, 'correo'=>$request->email];
        Mail::queue('mails.welcome', $data, function ($message) use ($data) {
            $message->from('root.admtiempos@gmail.com', 'Registro Control Aulas');
            $message->to($data['correo'])->subject('Cuenta Registrada');
        });
        return redirect('/usuarios');
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
        $this->usuario->find('id')->delete();

        return redirect('usuarios');
    }
    public function actualizar($id)
    {
        $usuario = $this->usuario->find($id);
        return view('usuarios.editU',compact('usuario'));
    }
    public function updateU(Request $request, $id)
    {
      
      $usuario = $this->usuario->find($id);
      $usuario->name = $request->name;
      $usuario->celular = $request->celular;
      if ($request->password!="") {
      $usuario->password = Hash::make($request->password);
      }
      $usuario->save();
      return redirect('reservaciones');
    }

}
