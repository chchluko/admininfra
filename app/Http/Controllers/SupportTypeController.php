<?php

namespace App\Http\Controllers;

use App\SupportType;
use Illuminate\Http\Request;

class SupportTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resultado = SupportType::paginate(15);
        return view('soporte.tipo.index',compact('resultado'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('soporte.tipo.create');
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

        $tipo = new SupportType($request->all());
        $tipo->save();
        return redirect('soportetipo');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SupportType  $supportType
     * @return \Illuminate\Http\Response
     */
    public function show(SupportType $supportType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SupportType  $supportType
     * @return \Illuminate\Http\Response
     */
    public function edit(SupportType $supportType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SupportType  $supportType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SupportType $supportType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SupportType  $supportType
     * @return \Illuminate\Http\Response
     */
    public function destroy(SupportType $supportType)
    {
        //
    }
}
