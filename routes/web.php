<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\TiendasController;
use App\Http\Controllers\UsersController;
use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;


Auth::routes();




Route::get('/', function () {
    return view('welcome');
});





Route::middleware(['auth', 'checkRole:administrador'])->group(function () {
    

    Route::get('/homes', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/admi/administrador', function () {
        return view('administrador.pages.inicio');
    })->name('administrador');

    Route::get('/admi/usuarios', function () {
        return view('administrador.pages.usuarios');
    })->name('usuarios');

    Route::get('/admi/roles', function () {
        return view('administrador.pages.roles');
    })->name('roles');

    Route::get('/admi/tiendas', function () {
        return view('administrador.pages.tiendas');
    })->name('tiendas');



    /* ----------------------- usuarios controllers admin ----------------------- */
    Route::get('/get-all-users', [UsersController::class, 'getAllUsers'])->name('get-usuarios');
    Route::get('/count-all-users', [UsersController::class, 'countUsers'])->name('count-usuarios');
    Route::get('/buscar-usuario', [UsersController::class, 'buscarUsuario'])->name('buscar.usuario');

    Route::get('/get-all-roles', [RolesController::class, 'getAllRoles'])->name('get-roles');
    Route::get('/count-all-roles', [RolesController::class, 'countRoles'])->name('count-roles');


    Route::post('/roles/create', [RolesController::class, 'store'])->name('roles.create');
    Route::get('/roles/edit/{id}', [RolesController::class, 'edit'])->name('roles.edit');
    Route::put('/roles/update/{id}', [RolesController::class, 'update'])->name('roles.update');
    Route::delete('/roles/delete/{id}', [RolesController::class, 'destroy'])->name('roles.delete');


    Route::get('/get-all-tiendas', [TiendasController::class, 'getAllTiendas'])->name('get-tiendas');
    /*acceder a la carpeta logos*/
    Route::get('/logos/{filename}', function ($filename) {

        $path = storage_path('app/public/images/logos/' . $filename);
    
        if (!file_exists($path)) {
            abort(404);
        }
    
        return response()->file($path);
    })->name('logos');

    Route::post('/tiendas/create', [TiendasController::class, 'store'])->name('tienda.create');
    
    

    




});










Route::middleware(['auth', 'checkRole:usuario'])->group(function () {

    /* --------------------------------- USUARIO -------------------------------- */
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/user/home', function () {
        return view('usuarios.pages.home');
    })->name('home');

    Route::get('/user/create_store', function () {
        return view('usuarios.pages.create_store');
    })->name('create_store');

    /* --------------------------------- USUARIO -------------------------------- */



    /* --------------------------------- TIENDA --------------------------------- */
    Route::get('/tienda/home', function () {
        return view('tienda.pages.inicio');
    })->name('tienda');

    Route::get('/tienda/productos', function () {
        return view('tienda.pages.productos');
    })->name('productos');

    Route::get('/tienda/categorias', function () {
        return view('tienda.pages.categorias');
    })->name('categorias');

    Route::get('/tienda/ventas', function () {
        return view('tienda.pages.ventas');
    })->name('ventas');

    Route::get('/tienda/carrito', function () {
        return view('tienda.pages.carrito');
    })->name('carrito');

    Route::get('/tienda/clientes', function () {
        return view('tienda.pages.clientes');
    })->name('clientes');

    Route::get('/tienda/settings', function () {
        return view('tienda.pages.settings');
    })->name('settings');

    /* --------------------------------- TIENDA --------------------------------- */
});
















/* --------------------------------- TIENDA --------------------------------- */
