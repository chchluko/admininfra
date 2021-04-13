<?php

namespace App\Http\Controllers;

use App\PlatformType;
use Illuminate\Http\Request;

class PlatformTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resultado = PlatformType::paginate(15);
        return view('plataformas.tipo.index',compact('resultado'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('plataformas.tipo.create');
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
            'tipo' => 'required|string',
        ];
        $messages = [
            'tipo.required' => 'Debe introducir un texto',
            'tipo.string' => 'Cadena no valida',
        ];
        $this->validate($request, $rules, $messages);

        $tipo = new PlatformType($request->all());
        $tipo->save();
        return redirect('plataformastipo');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PlatformType  $platformType
     * @return \Illuminate\Http\Response
     */
    public function show(PlatformType $platformType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PlatformType  $platformType
     * @return \Illuminate\Http\Response
     */
    public function edit(PlatformType $platformType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PlatformType  $platformType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PlatformType $platformType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PlatformType  $platformType
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlatformType $platformType)
    {
        //
    }
}
