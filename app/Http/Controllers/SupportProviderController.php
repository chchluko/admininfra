<?php

namespace App\Http\Controllers;

use App\SupportProvider;
use Illuminate\Http\Request;

class SupportProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resultado = SupportProvider::paginate(15);
        return view('soporte.provedor.index', compact('resultado'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('soporte.provedor.create');
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

        $provedor = new SupportProvider($request->all());
        $provedor->save();
        return redirect('soporteprovedor');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SupportProvider  $supportProvider
     * @return \Illuminate\Http\Response
     */
    public function show(SupportProvider $supportProvider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SupportProvider  $supportProvider
     * @return \Illuminate\Http\Response
     */
    public function edit(SupportProvider $supportProvider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SupportProvider  $supportProvider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SupportProvider $supportProvider)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SupportProvider  $supportProvider
     * @return \Illuminate\Http\Response
     */
    public function destroy(SupportProvider $supportProvider)
    {
        //
    }
}
