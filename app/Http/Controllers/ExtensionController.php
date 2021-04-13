<?php

namespace App\Http\Controllers;

use App\Empleado;
use App\Extension;
use App\Ubicacion;
use App\ExtensionType;
use Illuminate\Http\Request;

class ExtensionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resultado = Extension::paginate(15);
        return view('extensiones.index',compact('resultado'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empleados = Empleado::select('NOMBRE','APELLIDOPATERNO','APELLIDOMATERNO','NOMINA')->active()->orderBy('NOMBRE')->get()->pluck('full_name','NOMINA')->prepend('Seleccione',0);
        $ubicaciones = Ubicacion::orderBy('NOMBRE_AREA')->pluck('NOMBRE_AREA','IDAREA')->prepend('Seleccione',0);
        $tipos = ExtensionType::get()->pluck('tipo','id')->prepend('Seleccione',0);
        return view('extensiones.create', compact('empleados','ubicaciones','tipos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $asignacion = new Extension($request->all());

        $empleado = Empleado::find($request->nomina);

        $asignacion->nombre = $empleado->FullName;
        $asignacion->area = $empleado->NOMBRE_AREA;
        $asignacion->depto = $empleado->NOMBRE_DEPARTAMENTO;
        $asignacion->puesto = $empleado->NOMBRE_PUESTO;
        $asignacion->save();

        return redirect('extensiones');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Extension  $extension
     * @return \Illuminate\Http\Response
     */
    public function show(Extension $extension)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Extension  $extension
     * @return \Illuminate\Http\Response
     */
    public function edit(Extension $extension)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Extension  $extension
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Extension $extension)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Extension  $extension
     * @return \Illuminate\Http\Response
     */
    public function destroy(Extension $extension)
    {
        //
    }
}
