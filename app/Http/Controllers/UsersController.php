<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{

    public function index()
    {
    }


    public function create()
    {
    }

    public function getAllUsers()
    {
        if (Auth::check()) {
            $totalUsers = User::count();

            $users = User::with('role:id,nombre')->get();

            $userData = [
                'users' => $users,
            ];

            return response()->json($userData);
        }else{
            return response()->json('mensaje','error');
        }
    }

    public function countUsers()
    {
        //para contar todos 
        $totalUsers = User::count();

        //No contamos al administrador general
        //$totalUsers = Role::where('id', '!=', 2)->count();


        // Cantidad de roles activos
        $totalUsersActivos = User::where('estado', 'activo')->count();

        // Cantidad de roles inactivos
        $totalUsersInactivos = User::where('estado', 'inactivo')->count();

        $usersData = [
            'total_users' => $totalUsers,
            'total_users_activos' => $totalUsersActivos,
            'total_users_inactivos' => $totalUsersInactivos,
        ];

        return response()->json($usersData);
    }




    public function store(Request $request)
    {
    }


    public function show(string $id)
    {
    }


    public function edit(string $id)
    {
    }


    public function update(Request $request, string $id)
    {
    }


    public function destroy(string $id)
    {
    }


    public function buscarUsuario(Request $request)
    {
        $parametroBusqueda = $request->input('id_usuario');

        if(!empty(trim($parametroBusqueda))){
            $usuarios = User::where(function ($query) use ($parametroBusqueda) {
                $query->where('id', 'LIKE', '%' . $parametroBusqueda . '%')
                    ->orWhere('cod_user', 'LIKE', '%' . $parametroBusqueda . '%')
                    ->orWhere(function ($query) use ($parametroBusqueda) {
                        $query->whereRaw('CONCAT(nombre, " ", apellidos) LIKE ?', ['%' . $parametroBusqueda . '%']);
                    });
            })->orderBy('id', 'desc')->get();
    
            if ($usuarios->isEmpty()) {
                return response()->json(['mensaje' => 'Usuarios no encontrados']);
            }else{
                return response()->json(['usuarios' => $usuarios]);
            }
        }

        
    }
}
