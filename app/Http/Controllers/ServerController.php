<?php

namespace App\Http\Controllers;

use App\Server;
use Carbon\Carbon;
use App\Datacenter;
use App\ServerType;
use App\Arquitecture;
use App\PlatformMark;
use App\PlatformType;
use App\TrackingManto;
use App\PlatformStatus;
use App\OperatingSystem;
use Illuminate\Http\Request;

class ServerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('plataformas.server.index');
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
        $opsystem = OperatingSystem::get()->pluck('name','id')->prepend('Seleccione',0);
        $arq = Arquitecture::get()->pluck('name','id')->prepend('Seleccione',0);
        $typeserver = ServerType::get()->pluck('name','id')->prepend('Seleccione',0);
        return view('plataformas.server.create', compact('tipos','status','marcas','datacenters','opsystem','arq','typeserver'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $server = new Server($request->all());
        $server->save();

        $manto = new TrackingManto();
        $manto->server_id = $server->id;
        $manto->fechamanto = $request->fmanto;
        $manto->save();
        return redirect()->route('servidores.index');
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
    public function edit(Server $servidore)
    {
        $tipos = PlatformType::get()->pluck('tipo','id')->prepend('Seleccione',0);
        $status = PlatformStatus::get()->pluck('status','id')->prepend('Seleccione',0);
        $marcas = PlatformMark::get()->pluck('marca','id')->prepend('Seleccione',0);
        $datacenters = Datacenter::get()->pluck('name','id')->prepend('Seleccione',0);
        $opsystem = OperatingSystem::get()->pluck('name','id')->prepend('Seleccione',0);
        $arq = Arquitecture::get()->pluck('name','id')->prepend('Seleccione',0);
        $typeserver = ServerType::get()->pluck('name','id')->prepend('Seleccione',0);
    return view('plataformas.server.edit', compact('servidore','tipos','status','marcas','datacenters','opsystem','arq','typeserver'));

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Server $servidore)
    {

        if($request->fmanto != $servidore->fmanto){
            $manto = new TrackingManto();
            $manto->server_id = $servidore->id;
            $manto->fechamanto = $request->fmanto;
            $manto->save();
        }
        $servidore->update($request->all());
        return redirect()->route('servidores.index');
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
