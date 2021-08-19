<?php

namespace App\Http\Controllers;

use App\PhoneKey;
use Illuminate\Http\Request;

class PhoneKeyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resultado = PhoneKey::where('comentario',3)->paginate(15);
        return view('clavestelefonicas.index',compact('resultado'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clavestelefonicas.create');
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
            'clave' => 'required|string',
        ];
        $messages = [
            'clave.required' => 'Debe introducir una clave',
            'clave.string' => 'Cadena no valida',
        ];
        $this->validate($request, $rules, $messages);

        $clavenueva = new PhoneKey($request->all());
        $clavenueva->save();
        return redirect('clavestelefonicas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PhoneKey  $phoneKey
     * @return \Illuminate\Http\Response
     */
    public function show(PhoneKey $phoneKey)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PhoneKey  $phoneKey
     * @return \Illuminate\Http\Response
     */
    public function edit(PhoneKey $clavestelefonica)
    {
        return view('clavestelefonicas.edit',compact('clavestelefonica'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PhoneKey  $phoneKey
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PhoneKey $clavestelefonica)
    {
        $clavestelefonica->update($request->all());
        return redirect('clavestelefonicas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PhoneKey  $phoneKey
     * @return \Illuminate\Http\Response
     */
    public function destroy(PhoneKey $phoneKey)
    {
        //
    }
}
