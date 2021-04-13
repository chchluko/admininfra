<?php

namespace App\Http\Controllers;

use App\MovilPlan;
use App\PlanType;
use Illuminate\Http\Request;

class MovilPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resultado = MovilPlan::paginate(15);
        return view('movil.plan.index',compact('resultado'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $plantypes = PlanType::get()->pluck('tipo','id')->prepend('Seleccione',0);
        return view('movil.plan.create',compact('plantypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $plan = new MovilPlan($request->all());
        $plan->save();
        return redirect('movilplan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MovilPlan  $movilPlan
     * @return \Illuminate\Http\Response
     */
    public function show(MovilPlan $movilPlan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MovilPlan  $movilPlan
     * @return \Illuminate\Http\Response
     */
    public function edit(MovilPlan $movilPlan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MovilPlan  $movilPlan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MovilPlan $movilPlan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MovilPlan  $movilPlan
     * @return \Illuminate\Http\Response
     */
    public function destroy(MovilPlan $movilPlan)
    {
        //
    }
}
