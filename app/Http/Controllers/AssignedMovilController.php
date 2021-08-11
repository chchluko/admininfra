<?php

namespace App\Http\Controllers;

use App\Movil;
use App\Empleado;
use App\AssignedMovil;
use App\MovilPlan;
use Illuminate\Http\Request;

class AssignedMovilController extends Controller
{

    public $filtros;

    public function __construct()
    {
        $this->filtros = ['0'=>'Seleccione un tipo','imei'=>'IMEI','lineatelefonica'=>'Teléfono','nomina'=>'Nomina'];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filtros = $this->filtros;
        $resultado = AssignedMovil::where('comentario', '')->paginate(15);
        return view('movil.asignacion.index', compact('resultado','filtros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empleados = Empleado::select('NOMBRE', 'APELLIDOPATERNO', 'APELLIDOMATERNO', 'NOMINA')->active()->orderBy('NOMBRE')->get()->pluck('NOMINA', 'NOMINA')->prepend('Seleccione', 0);
        $movils = Movil::asignada()->get()->pluck('imei', 'id')->prepend('Seleccione', 0);
        return view('movil.asignacion.create', compact('empleados', 'movils'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $asignacion = new AssignedMovil();
        $empleado = Empleado::find($request->nomina);
        $movil = Movil::find($request->movil_id);

        $asignacion->nomina = $empleado->NOMINA;
        $asignacion->movil_id = $request->movil_id;
        $asignacion->movil_plan_id = $movil->id;
        $asignacion->comentario = $request->comentario;
        $asignacion->condiciones = $request->condiciones;
        $asignacion->nombre = $empleado->FullName;
        $asignacion->area = $empleado->NOMBRE_AREA;
        $asignacion->depto = $empleado->NOMBRE_DEPARTAMENTO;
        $asignacion->puesto = $empleado->NOMBRE_PUESTO;
        $asignacion->save();
        $movil->asignado = 1;
        $movil->update();
        return redirect('asignacionmovil')->with('info', "Asignación guardada correctamente");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AssignedMovil  $assignedMovil
     * @return \Illuminate\Http\Response
     */
    public function show(AssignedMovil $assignedMovil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AssignedMovil  $assignedMovil
     * @return \Illuminate\Http\Response
     */
    public function edit(AssignedMovil $asignacionmovil)
    {
        $empleados = Empleado::select('NOMBRE', 'APELLIDOPATERNO', 'APELLIDOMATERNO', 'NOMINA')->active()
        ->orderBy('NOMBRE')->get()->pluck('NOMINA', 'NOMINA')->prepend('Seleccione', 0);
        $movils = Movil::get()->pluck('imei', 'id')->prepend('Seleccione', 0);
       return view('movil.asignacion.edit', compact('empleados','movils','asignacionmovil'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AssignedMovil  $assignedMovil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AssignedMovil $asignacionmovil)
    {
        $asignacionmovil->update($request->all());
        return redirect('asignacionmovil')->with('info', "Asignación Actualizada correctamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AssignedMovil  $assignedMovil
     * @return \Illuminate\Http\Response
     */
    public function destroy(AssignedMovil $assignedMovil)
    {
        //
    }

    public function searchAssignedMovil(Request $request)
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
        $tipo = $request->tipo;
        $nombre = $request->nombre;

        if ($request->tipo == 'imei') {
            $resultado = AssignedMovil::whereHas('movil', function ($query) use ($tipo, $nombre) {
                $query->buscarpor($tipo, $nombre);
            })->paginate(15);
        }
        if ($request->tipo == 'lineatelefonica') {
            $resultado = AssignedMovil::whereHas('plan', function ($query) use ($tipo, $nombre) {
                $query->buscarpor($tipo, $nombre);
            })->paginate(15);
        }
        if ($request->tipo == 'nomina') {
            $resultado = AssignedMovil::buscarpor($request->tipo, $request->nombre)->paginate(15);
        }

        if ($resultado->count() > 0) {
            return view('movil.asignacion.index', compact('resultado'),compact('filtros'));
        }
        return redirect()->route('asignacionmovil.index')->with('info', "No hay resultados que coincidan")->withInput();
    }

    public function responsiva(AssignedMovil $asignacionmovil){

        $view =  \View::make('movil.pdf.responsiva', compact('asignacionmovil'))->render();
        $pdf = \App::make('dompdf.wrapper');

        $pdf->loadHTML($view);

        $pdf->setPaper('letter', 'portrait');
        return $pdf->download('Responsiva.pdf');
        // return $pdf->stream();
    }
}
