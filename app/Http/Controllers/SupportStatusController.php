<?php

namespace App\Http\Controllers;

use App\SupportStatus;
use Illuminate\Http\Request;

class SupportStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resultado = SupportStatus::paginate(15);
        return view('soporte.status.index', compact('resultado'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('soporte.status.create');
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
            'status' => 'required|string',
        ];
        $messages = [
            'status.required' => 'Debe introducir un texto',
            'status.string' => 'Cadena no valida',
        ];
        $this->validate($request, $rules, $messages);

        $status = new SupportStatus($request->all());
        $status->save();
        return redirect('soportestatus');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SupportStatus  $supportStatus
     * @return \Illuminate\Http\Response
     */
    public function show(SupportStatus $supportStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SupportStatus  $supportStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(SupportStatus $supportStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SupportStatus  $supportStatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SupportStatus $supportStatus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SupportStatus  $supportStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(SupportStatus $supportStatus)
    {
        //
    }
}
