<?php

namespace App\Http\Controllers;

use App\Support;
use App\SupportMark;
use App\SupportOwner;
use App\SupportType;
use App\SupportStatus;
use App\SupportProvider;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public $filtros;

    public function __construct()
    {
        $this->filtros = ['0'=>'Seleccione un tipo','inventario'=>'Inventario (Activo Fijo)','modelo'=>'Modelo','noserie'=>'Número de Serie','inventarioti'=>'Inventario (TI)'];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filtros = $this->filtros;
        $resultado = Support::where('noserie','')->paginate(15);
        return view('soporte.index', compact('resultado'),compact('filtros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos = SupportType::get()->pluck('tipo','id')->prepend('Seleccione',0);
        $provedores = SupportProvider::get()->pluck('provedor','id')->prepend('Seleccione',0);
        $status = SupportStatus::get()->pluck('status','id')->prepend('Seleccione',0);
        $marcas = SupportMark::get()->pluck('marca','id')->prepend('Seleccione',0);
        $owners = SupportOwner::get()->pluck('owner','id')->prepend('Seleccione',0);
        return view('soporte.create',compact('tipos','provedores','status','owners','marcas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $marca = new Support($request->all());
        $marca->save();
        return redirect('soporte');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Support  $support
     * @return \Illuminate\Http\Response
     */
    public function show(Support $support)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Support  $support
     * @return \Illuminate\Http\Response
     */
    public function edit(Support $soporte)
    {
        $tipos = SupportType::get()->pluck('tipo','id')->prepend('Seleccione',0);
        $provedores = SupportProvider::get()->pluck('provedor','id')->prepend('Seleccione',0);
        $status = SupportStatus::get()->pluck('status','id')->prepend('Seleccione',0);
        $marcas = SupportMark::get()->pluck('marca','id')->prepend('Seleccione',0);
        $owners = SupportOwner::get()->pluck('owner','id')->prepend('Seleccione',0);
        return view('soporte.edit',compact('tipos','provedores','status','owners','marcas','soporte'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Support  $support
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Support $support)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Support  $support
     * @return \Illuminate\Http\Response
     */
    public function destroy(Support $support)
    {
        //
    }


    public function searchSupport(Request $request)
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

        $resultado = Support::buscarpor($request->tipo, $request->nombre)->paginate(15);

        if ($resultado->count() > 0) {
            return view('soporte.index', compact('resultado'),compact('filtros'));
        }
        return redirect()->route('soporte.index')->with('info', "No hay resultados que coincidan")->withInput();
    }
}
