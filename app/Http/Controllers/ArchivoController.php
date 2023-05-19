<?php

namespace App\Http\Controllers;

use App\Models\Archivo;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArchivoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        $archivos = Archivo::all();
        return view('archivos.indexArchivo', compact('archivos', 'productos'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'archivo' => 'required|mimes:pdf,docx,xlsx,jpg,jpeg,png|max:2048',
        ]);
        if ($request->hasFile('archivo') && $request->file('archivo')->isValid()) {
            $ruta = $request->archivo->store('archivos', 'public');

            // Crear registro en tabla archivos
            Archivo::create([
                'hash' => $ruta,
                // Obtener nombre del archivo sin extensión
                'nombre' => pathinfo($request->archivo->getClientOriginalName(), PATHINFO_FILENAME),
                'extension' => $request->archivo->extension(),
                'mime' => $request->archivo->getMimeType(),
            ]);
            return redirect()->route('archivos.index')->with('archivo', 'subido');
        }
        return redirect()->route('archivos.index')->with('archivo', 'error');
    }

    public function destroy(Archivo $archivo)
    {
        Storage::delete($archivo->hash);
        $archivo->delete();

        return redirect()->route('archivos.index')->with('archivo', 'eliminado');
    }

    public function descargar(Archivo $archivo)
    {
        //$rutaArchivo = storage_path('app/public/' . $archivo->hash);
        return response()->download('storage/' . $archivo->hash, $archivo->nombre . '.' . $archivo->extension, [
            'Content-Type' => $archivo->mime
        ]);
    }

    public function relacionar(Request $request, Archivo $archivo)
    {
        $request->validate([
            'producto_id' => 'required|exists:productos,id',
        ]);

        $archivo->producto_id = $request->producto_id;
        $archivo->save();

        return redirect()->route('archivos.index');
    }

    public function desenlazar(Archivo $archivo)
    {
        $archivo->producto_id = null;
        $archivo->save();

        return redirect()->route('archivos.index');
    }

    public function reemplazar(Request $request, Archivo $archivo)
    {
        $request->validate([
            'archivo' => 'required|file',
        ]);
    
        if ($request->hasFile('archivo') && $request->file('archivo')->isValid()) {
            // Eliminar el archivo anterior
            Storage::delete($archivo->hash);
    
            // Subir el nuevo archivo
            $ruta = $request->archivo->store('archivos', 'public');
    
            // Actualizar los atributos del archivo
            $archivo->hash = $ruta;
            $archivo->nombre = pathinfo($request->archivo->getClientOriginalName(), PATHINFO_FILENAME);
            $archivo->extension = $request->archivo->getClientOriginalExtension();
            $archivo->mime = $request->archivo->getMimeType();
            $archivo->save();
    
            return redirect()->route('archivos.index');
        }
    
        return redirect()->route('archivos.index');
    }
}
