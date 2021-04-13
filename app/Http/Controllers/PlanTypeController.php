<?php

namespace App\Http\Controllers;

use App\PlanType;
use Illuminate\Http\Request;

class PlanTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resultado = PlanType::paginate(15);
        return view('movil.plan.tipo.index',compact('resultado'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('movil.plan.tipo.create');
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
            'tipo' => 'required|string',
        ];
        $messages = [
            'tipo.required' => 'Debe introducir un texto',
            'tipo.string' => 'Cadena no valida',
        ];
        $this->validate($request, $rules, $messages);

        $tipo = new PlanType($request->all());
        $tipo->save();
        return redirect('plantipo');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PlanType  $planType
     * @return \Illuminate\Http\Response
     */
    public function show(PlanType $planType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PlanType  $planType
     * @return \Illuminate\Http\Response
     */
    public function edit(PlanType $planType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PlanType  $planType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PlanType $planType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PlanType  $planType
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlanType $planType)
    {
        //
    }
}
