<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaginasController extends Controller
{
    public function canciones($id = null){
        $canciones = [];
        $canciones[] = ['nombre' => 'Hola',
                        'artista' => 'Yo'];
        $canciones[] = ['nombre' => 'Adios',
                        'artista' => 'Alguien'];

        if(!is_null($id)){
            $cancion = $canciones[$id];
        } else{
            $cancion = null;
        }


        return view('canciones', compact('canciones','cancion'));
    }

    public function contacto(){
        return view('contacto');
    }
    public function postContacto(Request $request){
        // Validar información
            $request->validate([
                'nombre' => 'required|string|max:255|min:3',
                'codigo' => ['required','integer', 'max:100'],
            ]);
        // Guardar a DB
        dd("Si pasó la validación");

        // Redireccionar a otra URL
    }
}

