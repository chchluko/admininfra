<?php

namespace App\Http\Controllers;

use App\Platform;
use App\Ubicacion;
use App\PlatformMark;
use App\PlatformType;
use App\PlatformStatus;
use App\PlatformProvider;
use Illuminate\Http\Request;

class PlatformController extends Controller
{

    public $filtros;

    public function __construct()
    {
        $this->filtros = ['0'=>'Seleccione un tipo','noserie'=>'Número de Serie','modelo'=>'Modelo'];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filtros = $this->filtros;
        $resultado = Platform::where('comentario', '')->paginate(15);
        return view('plataformas.index', compact('resultado','filtros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos = PlatformType::get()->pluck('tipo','id')->prepend('Seleccione',0);
        $provedores = PlatformProvider::get()->pluck('provedor','id')->prepend('Seleccione',0);
        $status = PlatformStatus::get()->pluck('status','id')->prepend('Seleccione',0);
        $marcas = PlatformMark::get()->pluck('marca','id')->prepend('Seleccione',0);
        $ubicaciones = Ubicacion::orderBy('NOMBRE_AREA')->pluck('NOMBRE_AREA','IDAREA')->prepend('Seleccione',0);
        return view('plataformas.create',compact('tipos','provedores','status','ubicaciones','marcas'));
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
            'vigenciagarantia' => 'required|string',
            'noserie' => 'required|string',
            'modelo' => 'required|string',
            'ubicacion_id' => 'notin:0',
            'provider_id' => 'notin:0',
            'type_id' => 'notin:0',
            'status_id' => 'notin:0',
            'mark_id' => 'notin:0',
        ];
        $messages = [
            'vigenciagarantia.required' => 'Debe introducir una vigencia',
            'vigenciagarantia.string' => 'Cadena no valida',
            'noserie.required' => 'Debe introducir un número de serie',
            'noserie.string' => 'Cadena no valida',
            'modelo.required' => 'Debe introducir un modelo',
            'modelo.string' => 'Cadena no valida',
            'ubicacion_id.notin' => 'Debe elegir una Ubicación',
            'type_id.notin' => 'Debe elegir un Tipo',
            'status_id.notin' => 'Debe elegir un Status',
            'provider_id.notin' => 'Debe elegir un Proveedor',
            'mark_id.notin' => 'Debe elegir una Marca',
        ];
        $this->validate($request, $rules, $messages);

        $marca = new Platform($request->all());
        $marca->save();
        return redirect('plataformas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Platform  $platform
     * @return \Illuminate\Http\Response
     */
    public function show(Platform $plataforma)
    {
        return view('plataformas.show',compact('plataforma'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Platform  $platform
     * @return \Illuminate\Http\Response
     */
    public function edit(Platform $plataforma)
    {
        $tipos = PlatformType::get()->pluck('tipo','id')->prepend('Seleccione',0);
        $provedores = PlatformProvider::get()->pluck('provedor','id')->prepend('Seleccione',0);
        $status = PlatformStatus::get()->pluck('status','id')->prepend('Seleccione',0);
        $marcas = PlatformMark::get()->pluck('marca','id')->prepend('Seleccione',0);
        $ubicaciones = Ubicacion::orderBy('NOMBRE_AREA')->pluck('NOMBRE_AREA','IDAREA')->prepend('Seleccione',0);
        return view('plataformas.edit',compact('tipos','provedores','status','ubicaciones','marcas','plataforma'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Platform  $platform
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Platform $plataforma)
    {
        $rules = [
            'vigenciagarantia' => 'required|string',
            'noserie' => 'required|string',
            'modelo' => 'required|string',
            'ubicacion_id' => 'notin:0',
            'provider_id' => 'notin:0',
            'type_id' => 'notin:0',
            'status_id' => 'notin:0',
            'mark_id' => 'notin:0',
        ];
        $messages = [
            'vigenciagarantia.required' => 'Debe introducir una vigencia',
            'vigenciagarantia.string' => 'Cadena no valida',
            'noserie.required' => 'Debe introducir un número de serie',
            'noserie.string' => 'Cadena no valida',
            'modelo.required' => 'Debe introducir un modelo',
            'modelo.string' => 'Cadena no valida',
            'ubicacion_id.notin' => 'Debe elegir una Ubicación',
            'type_id.notin' => 'Debe elegir un Tipo',
            'status_id.notin' => 'Debe elegir un Status',
            'provider_id.notin' => 'Debe elegir un Proveedor',
            'mark_id.notin' => 'Debe elegir una Marca',
        ];
        $this->validate($request, $rules, $messages);

        $plataforma->update($request->all());
        return redirect('plataformas')->with('success', "Registro Actualizado correctammente");
    }

    public function searchPlatform(Request $request)
    {
        $rules = [
            'nombre' => 'required|string',
            'tipo' => 'notin:0'
        ];
        $messages = [
            'nombre.required' => 'Debe introducir un texto',
            'nombre.string' => 'Cadena no valida',
            'tipo.notin' => 'Debe elegir un tipo de campo a buscar',
        ];
        $this->validate($request, $rules, $messages);

        $filtros = $this->filtros;

        $resultado = Platform::buscarpor($request->tipo, $request->nombre)->paginate(15);

        if ($resultado->count() > 0) {
            return view('plataformas.index', compact('resultado'),compact('filtros'));
        }
        return redirect()->route('plataformas.index')->with('info', "No hay resultados que coincidan")->withInput();
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Platform  $platform
     * @return \Illuminate\Http\Response
     */
    public function destroy(Platform $platform)
    {
        //
    }

}
