<?php

namespace App\Http\Controllers;

use App\AssignedPhoneKey;
use App\Empleado;
use App\PhoneKey;
use Illuminate\Http\Request;

class AssignedPhoneKeyController extends Controller
{

    public $filtros;

    public function __construct()
    {
        $this->filtros = ['0'=>'Seleccione un tipo','nomina'=>'Número de Nómina','clave'=>'Clave Teléfonica'];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filtros = $this->filtros;
        $resultado = AssignedPhoneKey::where('comentario', '')->paginate(15);
        return view('clavestelefonicas.asignacion.index', compact('resultado','filtros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empleados = Empleado::select('NOMBRE','APELLIDOPATERNO','APELLIDOMATERNO','NOMINA')->active()->orderBy('NOMBRE')->get()->pluck('full_name','NOMINA')->prepend('Seleccione',0);
        $claves = PhoneKey::where('asignado',0)->pluck('clave','id')->prepend('Seleccione',0);
        return view('clavestelefonicas.asignacion.create',compact('empleados','claves'));
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
            'alcance' => 'required|string',
            'nomina' => 'notin:0',
            'phone_key_id' => 'notin:0',
        ];
        $messages = [
            'alcance.required' => 'Debe introducir un alcance',
            'alcance.string' => 'Cadena no valida',
            'nomina.notin' => 'Debe elegir un colaborador',
            'phone_key_id.notin' => 'Debe elegir una clave telefonica',
        ];
        $this->validate($request, $rules, $messages);

        $asignacion = new AssignedPhoneKey();
        $empleado = Empleado::find($request->nomina);

        $clave = PhoneKey::find($request->phone_key_id);

        $asignacion->nomina = $empleado->NOMINA;
        $asignacion->phone_key_id = $request->phone_key_id;
        $asignacion->clave = $clave->clave;
        $asignacion->alcance = $request->alcance;
        $asignacion->nombre = $empleado->FullName;
        $asignacion->area = $empleado->NOMBRE_AREA;
        $asignacion->depto = $empleado->NOMBRE_DEPARTAMENTO;
        $asignacion->puesto = $empleado->NOMBRE_PUESTO;
        $asignacion->save();

        $clave->asignado = 1;
        $clave->save();

        return redirect('asignacionclaves')->with('info', "Asignación guardada correctamente");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AssignedPhoneKey  $assignedPhoneKey
     * @return \Illuminate\Http\Response
     */
    public function show(AssignedPhoneKey $assignedPhoneKey)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AssignedPhoneKey  $assignedPhoneKey
     * @return \Illuminate\Http\Response
     */
    public function edit(AssignedPhoneKey $assignedPhoneKey)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AssignedPhoneKey  $assignedPhoneKey
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AssignedPhoneKey $assignedPhoneKey)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AssignedPhoneKey  $assignedPhoneKey
     * @return \Illuminate\Http\Response
     */
    public function destroy(AssignedPhoneKey $assignedPhoneKey)
    {
        //
    }


    public function searchAssignedKey(Request $request)
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

        $resultado = AssignedPhoneKey::buscarpor($request->tipo, $request->nombre)->paginate(15);

        if ($resultado->count() > 0) {
            return view('clavestelefonicas.asignacion.index', compact('resultado'),compact('filtros'));
        }
        return redirect()->route('asignacionclaves.index')->with('info', "No hay resultados que coincidan")->withInput();
    }



}
