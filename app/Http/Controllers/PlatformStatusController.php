<?php

namespace App\Http\Controllers;

use App\PlatformStatus;
use Illuminate\Http\Request;

class PlatformStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resultado = PlatformStatus::paginate(15);
        return view('plataformas.status.index', compact('resultado'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('plataformas.status.create');
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

        $status = new PlatformStatus($request->all());
        $status->save();
        return redirect('plataformasstatus');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PlatformStatus  $platformStatus
     * @return \Illuminate\Http\Response
     */
    public function show(PlatformStatus $platformStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PlatformStatus  $platformStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(PlatformStatus $platformStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PlatformStatus  $platformStatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PlatformStatus $platformStatus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PlatformStatus  $platformStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlatformStatus $platformStatus)
    {
        //
    }
}
