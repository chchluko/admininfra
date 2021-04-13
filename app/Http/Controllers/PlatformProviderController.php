<?php

namespace App\Http\Controllers;

use App\PlatformProvider;
use Illuminate\Http\Request;

class PlatformProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resultado = PlatformProvider::paginate(15);
        return view('plataformas.provedor.index', compact('resultado'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('plataformas.provedor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'provedor' => 'required|string',
        ];
        $messages = [
            'provedor.required' => 'Debe introducir un texto',
            'provedor.string' => 'Cadena no valida',
        ];
        $this->validate($request, $rules, $messages);

        $provedor = new PlatformProvider($request->all());
        $provedor->save();
        return redirect('plataformasprovedor');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PlatformProvider  $platformProvider
     * @return \Illuminate\Http\Response
     */
    public function show(PlatformProvider $platformProvider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PlatformProvider  $platformProvider
     * @return \Illuminate\Http\Response
     */
    public function edit(PlatformProvider $platformProvider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PlatformProvider  $platformProvider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PlatformProvider $platformProvider)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PlatformProvider  $platformProvider
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlatformProvider $platformProvider)
    {
        //
    }
}
