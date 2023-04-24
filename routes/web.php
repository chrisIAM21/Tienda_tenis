<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('productos', ProductoController::class);

Route::middleware([ //Middleware para proteger las rutas, esto se creó cuando se ejecutó el comando php artisan make:auth
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::resource('categorias', CategoriaController::class);

# Ruta para poder seleccionar y enlazar los productos a una categoria específica (el método en el controlador es public function agregarProductos(Request $request, Categoria $categoria))
Route::post('categorias/{categoria}/agregarProductos', [CategoriaController::class, 'agregarProductos'])->name('categorias.agregarProductos');