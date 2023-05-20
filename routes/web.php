<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ArchivoController;

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

Route::middleware([ //Middleware para proteger las rutas, esto se creó cuando se ejecutó el comando php artisan make:auth
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::resource('productos', ProductoController::class);
});

Route::resource('categorias', CategoriaController::class);
Route::delete('/categorias/{categoria}/quitar-productos', [CategoriaController::class, 'quitarProductos'])->name('categorias.quitarProductos');

# Ruta para poder seleccionar y enlazar los productos a una categoria específica (el método en el controlador es public function agregarProductos(Request $request, Categoria $categoria))
Route::post('categorias/{categoria}/agregarProductos', [CategoriaController::class, 'agregarProductos'])->name('categorias.agregarProductos');

# Ruta para realizar una consulta de los productos y devolver un JSON
Route::get('/consulta', [ProductoController::class, 'realizarConsulta']);

Route::get('archivos/descargar/{archivo}', [ArchivoController::class, 'descargar'])->name('archivos.descargar');
Route::resource('archivos', ArchivoController::class);
Route::post('/archivos/{archivo}/relacionar', [ArchivoController::class, 'relacionar'])->name('archivos.relacionar');
Route::delete('/archivos/{archivo}/desenlazar', [ArchivoController::class, 'desenlazar'])->name('archivos.desenlazar');
Route::put('archivos/{archivo}/reemplazar', [ArchivoController::class, 'reemplazar'])->name('archivos.reemplazar');

Route::get('/storage/{archivo}', function ($archivo) {
    $rutaArchivo = storage_path('app/archivos/' . $archivo);
    return response()->file($rutaArchivo);
});
