<?php

namespace App\Http\Controllers;

use App\MovilStatus;
use Illuminate\Http\Request;

class MovilStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resultado = MovilStatus::paginate(15);
        return view('movil.status.index',compact('resultado'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('movil.status.create');
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

        $status = new MovilStatus($request->all());
        $status->save();
        return redirect('movilstatus');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MovilStatus  $movilStatus
     * @return \Illuminate\Http\Response
     */
    public function show(MovilStatus $movilStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MovilStatus  $movilStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(MovilStatus $movilStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MovilStatus  $movilStatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MovilStatus $movilStatus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MovilStatus  $movilStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(MovilStatus $movilStatus)
    {
        //
    }
}
