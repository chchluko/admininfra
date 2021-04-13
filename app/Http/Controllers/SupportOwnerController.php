<?php

namespace App\Http\Controllers;

use App\SupportOwner;
use Illuminate\Http\Request;

class SupportOwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resultado = SupportOwner::paginate(15);
        return view('soporte.owner.index', compact('resultado'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('soporte.owner.create');
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
            'owner' => 'required|string',
        ];
        $messages = [
            'owner.required' => 'Debe introducir un texto',
            'owner.string' => 'Cadena no valida',
        ];
        $this->validate($request, $rules, $messages);

        $owner = new SupportOwner($request->all());
        $owner->save();
        return redirect('soporteowner');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SupportOwner  $supportOwner
     * @return \Illuminate\Http\Response
     */
    public function show(SupportOwner $supportOwner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SupportOwner  $supportOwner
     * @return \Illuminate\Http\Response
     */
    public function edit(SupportOwner $supportOwner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SupportOwner  $supportOwner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SupportOwner $supportOwner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SupportOwner  $supportOwner
     * @return \Illuminate\Http\Response
     */
    public function destroy(SupportOwner $supportOwner)
    {
        //
    }
}
