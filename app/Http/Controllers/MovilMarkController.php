<?php

namespace App\Http\Controllers;

use App\MovilMark;
use Illuminate\Http\Request;

class MovilMarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resultado = MovilMark::paginate(15);
        return view('movil.marca.index',compact('resultado'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('movil.marca.create');
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

        $marca = new MovilMark($request->all());
        $marca->save();
        return redirect('movilmarca');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Movilmarca  $movilMark
     * @return \Illuminate\Http\Response
     */
    public function show(MovilMark $movilMark)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MovilMark  $movilMark
     * @return \Illuminate\Http\Response
     */
    public function edit(MovilMark $movilMark)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MovilMark  $movilMark
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MovilMark $movilMark)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MovilMark  $movilMark
     * @return \Illuminate\Http\Response
     */
    public function destroy(MovilMark $movilMark)
    {
        //
    }
}
