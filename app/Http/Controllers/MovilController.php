<?php

namespace App\Http\Controllers;

use App\Movil;
use App\MovilMark;
use App\MovilPlan;
use App\MovilType;
use App\MovilStatus;
use Illuminate\Http\Request;

class MovilController extends Controller
{
    public $filtros;

    public function __construct()
    {
        $this->filtros = ['0'=>'Seleccione un tipo','imei'=>'IMEI','noserie'=>'Numero de Serie','modelo'=>'Modelo'];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filtros = $this->filtros;
        $resultado = Movil::where('comentario', '3')->paginate(15);
        return view('movil.index', compact('resultado','filtros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos = MovilType::get()->pluck('tipo','id')->prepend('Seleccione',0);
        $status = MovilStatus::get()->pluck('status','id')->prepend('Seleccione',0);
        $marcas = MovilMark::get()->pluck('marca','id')->prepend('Seleccione',0);
        $lineas = MovilPlan::asignada()->get()->pluck('lineatelefonica','id')->prepend('Seleccione',0);
        return view('movil.create',compact('tipos','status','marcas','lineas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $marca = new Movil($request->all());
        $marca->save();
        $plan = MovilPlan::find($marca->movil_plan_id);
        $plan->asignado = 1;
        $plan->update();
        return redirect('movil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Movil  $movil
     * @return \Illuminate\Http\Response
     */
    public function show(Movil $movil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Movil  $movil
     * @return \Illuminate\Http\Response
     */
    public function edit(Movil $movil)
    {
        $tipos = MovilType::get()->pluck('tipo','id')->prepend('Seleccione',0);
        $status = MovilStatus::get()->pluck('status','id')->prepend('Seleccione',0);
        $marcas = MovilMark::get()->pluck('marca','id')->prepend('Seleccione',0);
        $lineas = MovilPlan::get()->pluck('lineatelefonica','id')->prepend('Seleccione',0);
        return view('movil.edit',compact('movil','tipos','status','marcas','lineas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Movil  $movil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movil $movil)
    {
        //
    }

    public function searchMovil(Request $request)
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

        $resultado = Movil::buscarpor($request->tipo, $request->nombre)->paginate(15);

        if ($resultado->count() > 0) {
            return view('movil.index', compact('resultado','filtros'));
        }
        return redirect()->route('movil.index')->with('info', "No hay resultados que coincidan")->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Movil  $movil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movil $movil)
    {
        //
    }
}
