<?php

namespace App\Http\Controllers;

use App\Support;
use App\Empleado;
use App\Ubicacion;
use App\AssignedSupport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssignedSupportController extends Controller
{
    public $filtros;

    public function __construct()
    {
        $this->filtros = ['0'=>'Seleccione un tipo','nomina'=>'NOMINA','nombre'=>'NOMBRE','area'=>'AREA','depto'=>'DEPARTAMENTO','inventario'=>'INVENTARIO'];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filtros = $this->filtros;
        $resultado = AssignedSupport::where('inventario','')->paginate(15);
        return view('soporte.asignacion.index', compact('resultado'),compact('filtros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empleados = Empleado::select('NOMBRE', 'APELLIDOPATERNO', 'APELLIDOMATERNO', 'NOMINA')->active()->orderBy('NOMBRE')->get()->pluck('full_name', 'NOMINA')->prepend('Seleccione', 0);
        $ubicaciones = Ubicacion::orderBy('NOMBRE_AREA')->pluck('NOMBRE_AREA', 'IDAREA')->prepend('Seleccione', 0);
        $hardware = Support::asignada()->pluck('inventario', 'id')->prepend('Seleccione', 0);
        return view('soporte.asignacion.create', compact('empleados', 'hardware', 'ubicaciones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $asignacion = new AssignedSupport();
        $empleado = Empleado::find($request->nomina);
        $hardware = Support::find($request->support_id);

        $asignacion->nomina = $empleado->NOMINA;
        $asignacion->support_id = $request->support_id;
        $asignacion->ubicacion_id = $request->ubicacion_id;
        $asignacion->inventario = $hardware->inventario;
        $asignacion->comentario = $request->comentario;
        $asignacion->condiciones = $request->condiciones;
        $asignacion->nombre = $empleado->FullName;
        $asignacion->area = $empleado->NOMBRE_AREA;
        $asignacion->depto = $empleado->NOMBRE_DEPARTAMENTO;
        $asignacion->puesto = $empleado->NOMBRE_PUESTO;
        $asignacion->save();

        $hardware->asignado = 1;
        $hardware->save();

        return redirect('asignacionsoporte');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AssignedSupport  $assignedSupport
     * @return \Illuminate\Http\Response
     */
    public function show(AssignedSupport $assignedSupport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AssignedSupport  $assignedSupport
     * @return \Illuminate\Http\Response
     */
    public function edit(AssignedSupport $assignedSupport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AssignedSupport  $assignedSupport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AssignedSupport $assignedSupport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AssignedSupport  $assignedSupport
     * @return \Illuminate\Http\Response
     */
    public function destroy(AssignedSupport $assignedSupport)
    {
        //
    }

    public function searchAssignedSupport(Request $request)
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

        $resultado = AssignedSupport::buscarpor($request->tipo, $request->nombre)->paginate(15);

        if ($resultado->count() > 0) {
            return view('soporte.asignacion.index', compact('resultado'),compact('filtros'));
        }
        return redirect()->route('asignacionsoporte.index')->with('info', "No hay resultados que coincidan")->withInput();
    }


    public function responsiva(AssignedSupport $asignacionsoporte)
    {
        $view =  \View::make('soporte.pdf.responsiva', compact('asignacionsoporte'))->render();
        $pdf = \App::make('dompdf.wrapper');

        $pdf->loadHTML($view);

        $pdf->setPaper('letter', 'portrait');
        return $pdf->download('Responsiva.pdf');
        // return $pdf->stream();
    }
}
