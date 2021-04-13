<?php

namespace App\Http\Controllers;

use App\SupportMark;
use Illuminate\Http\Request;

class SupportMarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resultado = SupportMark::paginate(15);
        return view('soporte.marca.index', compact('resultado'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('soporte.marca.create');
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
            'marca' => 'required|string',
        ];
        $messages = [
            'marca.required' => 'Debe introducir un texto',
            'marca.string' => 'Cadena no valida',
        ];
        $this->validate($request, $rules, $messages);

        $marca = new SupportMark($request->all());
        $marca->save();
        return redirect('soportemarca');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SupportMark  $supportMark
     * @return \Illuminate\Http\Response
     */
    public function show(SupportMark $supportMark)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SupportMark  $supportMark
     * @return \Illuminate\Http\Response
     */
    public function edit(SupportMark $supportMark)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SupportMark  $supportMark
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SupportMark $supportMark)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SupportMark  $supportMark
     * @return \Illuminate\Http\Response
     */
    public function destroy(SupportMark $supportMark)
    {
        //
    }
}
