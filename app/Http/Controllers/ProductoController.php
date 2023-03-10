<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::get();
        return view('indexProducto', compact('productos')); // la ruta para ver en web sería: localhost:8000/productos
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createProducto'); // la ruta para ver en web sería: localhost:8000/productos/create
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'color' => ['required', 'max:40'],
            'stock' => 'required|numeric|min:0',
        ]);

        $producto = new Producto();
        $producto->nombre = $request->nombre;
        $producto->color = $request->color;
        $producto->stock = $request->stock;
        $producto->save();

        return redirect('/productos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //Retornamos la vista showProducto.blade.php
        return view('showProducto', compact('producto')); // la ruta para ver en web sería: localhost:8000/productos/{id} | El compact es para pasarle el producto
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        return view('editProducto', compact('producto')); // la ruta para ver en web sería: localhost:8000/productos/{id}/edit
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'color' => ['required', 'max:40'],
            'stock' => 'required|numeric|min:0',
        ]);

        $producto->nombre = $request->nombre;
        $producto->color = $request->color;
        $producto->stock = $request->stock;
        $producto->save();

        return redirect('/productos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();
        //return redirect('/productos');
        return redirect()->route('productos.index');
    }
}
