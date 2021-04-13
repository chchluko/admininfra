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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resultado = Movil::paginate(15);
        return view('movil.index', compact('resultado'));
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
        //
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
