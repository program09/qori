<?php

namespace App\Http\Controllers;

use App\Models\Tienda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TiendasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    public function getAllTiendas()
    {
        $tiendas = Tienda::with('user:id,cod_user')->get(); // Obtén todas las tiendas con los campos 'id' y 'cod_user' del usuario relacionado

        return response()->json(['tiendas' => $tiendas]);
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

    /*public function store(Request $request)
    {
        $imagenNombre = $request->file('input_logo')->getClientOriginalName();

        $imagenRuta = $request->file('input_logo')->store('public/images');
        $imagenURL = asset('storage/' . str_replace('public/', '', $imagenRuta));

        return response()->json([
            'message' => 'Formulario enviado con éxito'. $request,
            'imagen_nombre' => $imagenNombre,
            'imagen_url' => $imagenURL, // URL pública de la imagen
        ]);
    }*/

    public function store(Request $request)
    {
        $request->validate([
            'usuario' => 'required',
            'tienda' => 'required',
            'estado' => 'required',
            'input_logo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $generatedCodTienda = 'T' . uniqid();

        $tienda = new Tienda([
            'cod_tienda' => $generatedCodTienda,
            'id_user' => $request->input('usuario'),
            'nombre' => $request->input('tienda'),
            'direccion' => $request->input('direccion'),
            'celular' => $request->input('celular'),
            'estado' => $request->input('estado'),
        ]);

        if ($request->hasFile('input_logo')) {
            $file = $request->file('input_logo');
            $fileName = $file->getClientOriginalName();
            $filePath = 'public/images/logos/' . $fileName;
            Storage::put($filePath, file_get_contents($file));
            $tienda->logo = $fileName;
        } else {
            $tienda->logo = 'logo.png';
        }

        $tienda->save();

        return response()->json(['message' => 'Tienda creada con éxito']);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
