<?php

namespace App\Http\Controllers;

use App\Screen;
use App\Datacenter;
use App\PlatformMark;
use App\PlatformType;
use App\PlatformStatus;
use Illuminate\Http\Request;

class ScreenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resultado = Screen::paginate(15);
        return view('plataformas.screen.index', compact('resultado'));
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

        return view('plataformas.screen.create', compact('tipos','status','marcas','datacenters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $screen = new Screen($request->all());
        $screen->save();

        return redirect()->route('screens.index');
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
    public function edit(Screen $screen)
    {
        $tipos = PlatformType::get()->pluck('tipo','id')->prepend('Seleccione',0);
        $status = PlatformStatus::get()->pluck('status','id')->prepend('Seleccione',0);
        $marcas = PlatformMark::get()->pluck('marca','id')->prepend('Seleccione',0);
        $datacenters = Datacenter::get()->pluck('name','id')->prepend('Seleccione',0);

        return view('plataformas.screen.edit', compact('screen','tipos','status','marcas','datacenters'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Screen $screen)
    {
        $screen->update($request->all());
        return redirect()->route('screens.index');
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
