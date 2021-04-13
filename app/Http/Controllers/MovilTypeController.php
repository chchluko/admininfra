<?php

namespace App\Http\Controllers;

use App\MovilType;
use Illuminate\Http\Request;

class MovilTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resultado = MovilType::paginate(15);
        return view('movil.tipo.index',compact('resultado'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('movil.tipo.create');
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

        $tipo = new MovilType($request->all());
        $tipo->save();
        return redirect('moviltipo');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MovilType  $movilType
     * @return \Illuminate\Http\Response
     */
    public function show(MovilType $movilType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MovilType  $movilType
     * @return \Illuminate\Http\Response
     */
    public function edit(MovilType $movilType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MovilType  $movilType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MovilType $movilType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MovilType  $movilType
     * @return \Illuminate\Http\Response
     */
    public function destroy(MovilType $movilType)
    {
        //
    }
}
