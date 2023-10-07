<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function getAllRoles()
    {
        if (Auth::check()) {
            $roles = Role::all();
            $rolesData = [
                'roles' => $roles,
            ];

            return response()->json($rolesData);
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Auth::check()) {
            // Validar los datos del formulario
            $request->validate([
                'rol' => 'required|string|max:20',
                'estado' => 'required|in:activo,inactivo',
            ]);

            // Verificar si los campos están vacíos
            if (empty($request->input('rol')) || empty($request->input('estado'))) {
                return response()->json(['message' => 'Campos vacíos'], 400); // 400 indica un error de solicitud incorrecta
            } else {
                $rol = new Role();
                $rol->nombre = $request->input('rol');
                $rol->estado = $request->input('estado');
                $rol->save();
                // Crear un arreglo con la información del nuevo rol
                $nuevoRol = [
                    'id' => $rol->id,
                    'nombre' => $rol->nombre,
                    'estado' => $rol->estado,
                ];

                return response()->json(['message' => 'Rol creado con éxito', 'nuevoRol' => $nuevoRol]);
            }
        }
    }



    public function countRoles()
    {
        //para contar todos 
        $totalRoles = Role::count();
        $totalRolesActivos = Role::where('estado', 'activo')->count();

        // Cantidad de roles inactivos
        $totalRolesInactivos = Role::where('estado', 'inactivo')->count();

        $rolesData = [
            'total_roles' => $totalRoles,
            'total_roles_activos' => $totalRolesActivos,
            'total_roles_inactivos' => $totalRolesInactivos,
        ];

        return response()->json($rolesData);
    }







    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (Auth::check()) {
            $rol = Role::find($id);
            return response()->json($rol);
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (Auth::check()) {
            // Validate the form data
            $validatedData = $request->validate([
                'rol_edit' => 'required|string|max:20',
                'estado_edit' => 'required|in:activo,inactivo',
            ]);

            // Update the role data in the database using the $id parameter
            $role = Role::findOrFail($id);
            $role->nombre = $validatedData['rol_edit'];
            $role->estado = $validatedData['estado_edit'];
            $role->save();

            // Crear un arreglo con la información del nuevo rol
            $editRol = [
                'id' => $role->id,
                'nombre' => $role->nombre,
                'estado' => $role->estado,
            ];

            return response()->json(['message' => 'Rol editó con éxito', 'editRol' => $editRol]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        if (Auth::check()) {
            try {
                $rol = Role::find($id);

                if (!$rol) {
                    return response()->json(['success' => false, 'message' => 'El rol no existe.'], 404);
                }

                // Intenta eliminar el rol
                $rol->delete();

                return response()->json(['success' => true, 'message' => 'El rol ha sido eliminado con éxito.']);
            } catch (\Illuminate\Database\QueryException $ex) {
                $errorCode = $ex->errorInfo[1];

                if ($errorCode === 1451) {
                    // Error de clave foránea (error code 1451)
                    return response()->json(['success' => false, 'message' => 'clave foranea'], 400);
                } else {
                    // Otro error de MySQL
                    return response()->json(['success' => false, 'message' => 'Error al eliminar el rol: ' . $ex->getMessage()], 500);
                }
            }
        }
    }
}
