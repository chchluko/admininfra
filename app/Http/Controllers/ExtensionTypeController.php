<?php

namespace App\Http\Controllers;

use App\ExtensionType;
use Illuminate\Http\Request;

class ExtensionTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resultado = ExtensionType::paginate(15);
        return view('extensiones.tipo.index',compact('resultado'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('extensiones.tipo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tipo = new ExtensionType($request->all());
        $tipo->save();

        return redirect('extensionestipo');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ExtensionType  $extensionType
     * @return \Illuminate\Http\Response
     */
    public function show(ExtensionType $extensionType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ExtensionType  $extensionType
     * @return \Illuminate\Http\Response
     */
    public function edit(ExtensionType $extensionType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ExtensionType  $extensionType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExtensionType $extensionType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ExtensionType  $extensionType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExtensionType $extensionType)
    {
        //
    }
}
