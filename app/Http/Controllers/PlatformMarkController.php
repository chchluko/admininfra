<?php

namespace App\Http\Controllers;

use App\PlatformMark;
use Illuminate\Http\Request;

class PlatformMarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resultado = PlatformMark::paginate(15);
        return view('plataformas.marca.index', compact('resultado'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('plataformas.marca.create');
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

        $marca = new PlatformMark($request->all());
        $marca->save();
        return redirect('plataformasmarca');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PlatformMark  $platformMark
     * @return \Illuminate\Http\Response
     */
    public function show(PlatformMark $platformMark)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PlatformMark  $platformMark
     * @return \Illuminate\Http\Response
     */
    public function edit(PlatformMark $platformMark)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PlatformMark  $platformMark
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PlatformMark $platformMark)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PlatformMark  $platformMark
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlatformMark $platformMark)
    {
        //
    }
}
