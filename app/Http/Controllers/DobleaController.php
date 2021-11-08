<?php

namespace App\Http\Controllers;

use App\Doblea;
use App\Datacenter;
use App\PlatformMark;
use App\PlatformType;
use App\PlatformStatus;
use Illuminate\Http\Request;

class DobleaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resultado = Doblea::paginate(15);
        return view('plataformas.doblea.index', compact('resultado'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos = PlatformType::get()->pluck('tipo','id')->prepend('Seleccione',0);
        $status = PlatformStatus::get()->pluck('status','id')->prepend('Seleccione',0);
        $marcas = PlatformMark::get()->pluck('marca','id')->prepend('Seleccione',0);
        $datacenters = Datacenter::get()->pluck('name','id')->prepend('Seleccione',0);

        return view('plataformas.doblea.create', compact('tipos','status','marcas','datacenters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $doblea = new Doblea($request->all());
        $doblea->save();

        return redirect()->route('doblea.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Doblea $doblea)
    {
        $tipos = PlatformType::get()->pluck('tipo','id')->prepend('Seleccione',0);
        $status = PlatformStatus::get()->pluck('status','id')->prepend('Seleccione',0);
        $marcas = PlatformMark::get()->pluck('marca','id')->prepend('Seleccione',0);
        $datacenters = Datacenter::get()->pluck('name','id')->prepend('Seleccione',0);

    return view('plataformas.doblea.edit', compact('tipos','status','marcas','datacenters','doblea'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doblea $doblea)
    {
        $doblea->update($request->all());
        return redirect()->route('doblea.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
