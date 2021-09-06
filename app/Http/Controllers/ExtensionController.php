<?php

namespace App\Http\Controllers;

use App\Empleado;
use App\Extension;
use App\Ubicacion;
use App\ExtensionType;
use Illuminate\Http\Request;

class ExtensionController extends Controller
{

    public $filtros;

    public function __construct()
    {
        $this->filtros = ['0'=>'Seleccione un tipo','nomina'=>'Número de Nómina','extension'=>'Extensión','modelo'=>'Modelo del Equipo','nombre'=>'Nombre'];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filtros = $this->filtros;
        $resultado = Extension::where('comentario', '')->paginate(15);
        return view('extensiones.index',compact('resultado','filtros'));
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
        $rules = [
            'modelo' => 'required|string',
            'extension' => 'required|integer',
            'type_id' => 'notin:0',
            'nomina' => 'notin:0',
            'ubicacion_id' => 'notin:0',
        ];
        $messages = [
            'modelo.required' => 'Debe introducir un texto',
            'modelo.string' => 'Cadena no valida',
            'extension.required' => 'Debe introducir una extensión',
            'extension.integer' => 'Debe ser un valor numerico',
            'type_id.notin' => 'Debe elegir un tipo',
            'nomina.notin' => 'Debe elegir un empleado',
            'ubicacion_id.notin' => 'Debe elegir una ubicación',
        ];
        $this->validate($request, $rules, $messages);


        $asignacion = new Extension($request->all());

        $empleado = Empleado::find($request->nomina);

        $asignacion->nombre = $empleado->FullName;
        $asignacion->area = $empleado->NOMBRE_AREA;
        $asignacion->depto = $empleado->NOMBRE_DEPARTAMENTO;
        $asignacion->puesto = $empleado->NOMBRE_PUESTO;
        $asignacion->save();

        return redirect('extensiones')->with('success', "Registro guardado correctamente");
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
    public function edit(Extension $extensione)
    {
        $empleados = Empleado::select('NOMBRE','APELLIDOPATERNO','APELLIDOMATERNO','NOMINA')->active()->orderBy('NOMBRE')->get()->pluck('full_name','NOMINA')->prepend('Seleccione',0);
        $ubicaciones = Ubicacion::orderBy('NOMBRE_AREA')->pluck('NOMBRE_AREA','IDAREA')->prepend('Seleccione',0);
        $tipos = ExtensionType::get()->pluck('tipo','id')->prepend('Seleccione',0);
        return view('extensiones.edit', compact('extensione','empleados','ubicaciones','tipos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Extension  $extension
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Extension $extensione)
    {
        $extensione->update($request->all());
        return redirect('extensiones');
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


    public function searchExtension(Request $request)
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

        $resultado = Extension::buscarpor($request->tipo, $request->nombre)->paginate(15);

        if ($resultado->count() > 0) {
            return view('extensiones.index', compact('resultado'),compact('filtros'));
        }
        return redirect()->route('extensiones.index')->with('info', "No hay resultados que coincidan")->withInput();
    }
}
