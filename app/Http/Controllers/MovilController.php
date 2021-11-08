<?php

namespace App\Http\Controllers;

use App\AssignedMovil;
use App\Movil;
use App\MovilMark;
use App\MovilPlan;
use App\MovilType;
use App\MovilStatus;
use App\Warehouse;
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
        return view('movil.index');
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
        $warehouses = Warehouse::whereNotIn('id',[1])->get()->pluck('name','id')->prepend('Seleccione',0);
        $lineas = MovilPlan::asignada()->get()->pluck('lineatelefonica','id')->prepend('Seleccione',0);
        return view('movil.create',compact('tipos','status','marcas','lineas','warehouses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $movil = new Movil($request->all());
        $movil->status_id = 1;
        $movil->save();
        $plan = MovilPlan::find($movil->movil_plan_id);
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
        $status = MovilStatus::get()->pluck('status','id');
        if ($movil->status_id == 1) {  // Stock
            unset($status['2']);
        }
        if ($movil->status_id == 2) { // Asignado
            unset($status['1']);
        }
        $marcas = MovilMark::get()->pluck('marca','id')->prepend('Seleccione',0);
        $lineas = MovilPlan::get()->pluck('lineatelefonica','id')->prepend('Seleccione',0);
        $warehouses = Warehouse::whereNotIn('id',[1])->get()->pluck('name','id');
        return view('movil.edit',compact('movil','tipos','status','marcas','lineas','warehouses'));
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
        if ($request->status_id > 2) {
            $movil->asignado = 0;
            $movil->activo = 0;

            if ($movil->status_id == 2){
                $assignedmovil = AssignedMovil::where('movil_id',$movil->id)->activo()->first();
                $assignedmovil->activo = 0;
                $assignedmovil->update();
            }
        }

        $movil->fill($request->all());
        $movil->update();
        return redirect('movil');
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
