<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Perfil;
use Illuminate\Http\Request;
use Illuminate\Mail;


class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'     => 'required|max:255',
          //  'email'    => 'required|email|max:255|unique:users|regex:/(.*)\@utn\.ac\.cr$/i',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name'      => $data['name'],
            'email'     => $data['email'],
            'celular'   => $data['celular'],
            'perfil_id' => $data['perfil_id'],
            'es_docente'=> $data['es_docente'],
            'password'  => bcrypt($data['password']),
        ]);
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        if (property_exists($this, 'registerView')) {
            return view($this->registerView);
        }
        $perfiles = Perfil::all();
        return view('auth.register', compact('perfiles'));
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $password = str_random(8);
        $request['password'] = $password;
        $request['password_confirmation'] = $password;
        $request['es_docente'] = $request->input('es_docente') === 'on';
        $request['activo'] = $request->input('es_aula') === 'on';

        $validator = $this->validator($request->all());
        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
                );
        }

        $this->create($request->all());
        $data = array(
            'name' => $request->name,
            'password'=>$password,
            'correo'=>$request->email,
        );

        \Mail::queue('mails.welcome', $data, function ($message) use ($data) {

            $message->from('root.admtiempos@gmail.com', 'Registro Control Aulas');

            $message->to($data['correo'])->subject('Cuenta Registrada');

        });
        return redirect('/');
    }
}
