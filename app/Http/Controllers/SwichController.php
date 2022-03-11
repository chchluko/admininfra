<?php

namespace App\Http\Controllers;

use App\Swich;
use App\Datacenter;
use App\PlatformMark;
use App\PlatformType;
use App\PlatformStatus;
use Illuminate\Http\Request;

class SwichController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('plataformas.swich.index');
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

        return view('plataformas.swich.create', compact('tipos','status','marcas','datacenters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $router = new Swich($request->all());
        $router->save();

        return redirect()->route('switchs.index');
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
    public function edit(Swich $switch)
    {
        $tipos = PlatformType::get()->pluck('tipo','id')->prepend('Seleccione',0);
        $status = PlatformStatus::get()->pluck('status','id')->prepend('Seleccione',0);
        $marcas = PlatformMark::get()->pluck('marca','id')->prepend('Seleccione',0);
        $datacenters = Datacenter::get()->pluck('name','id')->prepend('Seleccione',0);

    return view('plataformas.swich.edit', compact('tipos','status','marcas','datacenters','switch'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Swich $switch)
    {
        $switch->update($request->all());
        return redirect()->route('switchs.index');
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
