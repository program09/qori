<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{


    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;



    ///VERIFICAR LA RUTA PARA CADA USUARIO
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
        $this->middleware('guest')->except('logout');
    }
}
