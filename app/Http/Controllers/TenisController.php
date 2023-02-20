<?php

namespace App\Http\Controllers;

use App\Models\Tenis;
use Illuminate\Http\Request;

class TenisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tenis = Tenis::get();

        //dd($tenis);
        return view('indexTenis', compact('tenis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createTenis');
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
            'modelo' => 'required|max:255',
            'color' => 'required'
        ]);

        //dd($request->all);
        $tenis = new Tenis();
        $tenis->modelo = $request->modelo;
        $tenis->color = $request->color;
        $tenis->save();

        return redirect('/tenis');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tenis  $tenis
     * @return \Illuminate\Http\Response
     */
    public function show(Tenis $tenis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tenis  $tenis
     * @return \Illuminate\Http\Response
     */
    public function edit(Tenis $tenis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tenis  $tenis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tenis $tenis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tenis  $tenis
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tenis $tenis)
    {
        //
    }
}
