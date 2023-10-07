<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;

    protected function redirectTo()
    {
        // Verifica el tipo de usuario y redirige en consecuencia
        if (Auth::user()->role->nombre === 'administrador') {
            return '/admi/administrador'; // Ruta para usuarios administradores
        } elseif (Auth::user()->role->nombre === 'usuario') {
            return '/user/home'; // Ruta para usuarios normales
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'name' => ['required', 'string', 'max:50'],
            'lastname' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $generatedCodUser = 'Q' . uniqid();

        return User::create([
            'nombre' => $data['name'],
            'apellidos' => $data['lastname'], //$data['apellidos'],
            'sexo' => '', // $data['sexo'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'estado' => 'activo',
            'id_rol' => 1,
            'cod_user' => $generatedCodUser,
            'foto' => 'user.png',
        ]);
        
    }
}
