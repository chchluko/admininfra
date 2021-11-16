<?php

namespace App\Http\Controllers;

use App\Movil;
use App\Empleado;
use App\MovilPlan;
use App\Warehouse;
use App\AssignedMovil;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AssignedMovilsExport;


class AssignedMovilController extends Controller
{

    public $filtros;

    public function __construct()
    {
        $this->filtros = ['0' => 'Seleccione un tipo', 'imei' => 'IMEI', 'lineatelefonica' => 'Teléfono', 'nomina' => 'Nomina'];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('movil.asignacion.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empleados = Empleado::select('NOMBRE', 'APELLIDOPATERNO', 'APELLIDOMATERNO', 'NOMINA')->active()->orderBy('NOMBRE')->get()->pluck('name_and_nomina', 'NOMINA')->prepend('Seleccione', 0);
        $movils = Movil::libre()->get()->pluck('imei', 'id')->prepend('Seleccione', 0);
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
        $movil->status_id = 2;
        $movil->asignado = 1;
        $movil->warehouse_id = 1;
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
        $empleados = Empleado::select('NOMBRE', 'APELLIDOPATERNO', 'APELLIDOMATERNO', 'NOMINA')->where('NOMINA',$asignacionmovil->nomina)->get()->pluck('name_and_nomina', 'NOMINA');
        if ($asignacionmovil->activo == 0) {
            $movils = Movil::where('id',$asignacionmovil->movil_id)->get()->pluck('imei', 'id');
        } else {
         /* $empleados = Empleado::select('NOMBRE', 'APELLIDOPATERNO', 'APELLIDOMATERNO', 'NOMINA')
            ->active()->orderBy('NOMBRE')->get()->pluck('name_and_nomina', 'NOMINA')->prepend('Seleccione', 0);*/
            $movils = Movil::select('imei', 'id')->libre()->get()->pluck('imei', 'id');
        }
        return view('movil.asignacion.edit', compact('empleados', 'movils', 'asignacionmovil'));
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
        if ($request->movil_id != $asignacionmovil->movil_id) {

            $asignacionmovil->activo = 0;
            $asignacionmovil->update();

            $movillegacy = Movil::find($asignacionmovil->movil_id);
            $movillegacy->status_id = 1;
            $movillegacy->warehouse_id = 4;
            $movillegacy->asignado = 0;
            $movillegacy->update();

            $asignacion = new AssignedMovil();
            $empleado = Empleado::find($request->nomina);
            $movil = Movil::find($request->movil_id);
            $asignacion->nomina = $empleado->NOMINA;
            $asignacion->movil_id = $request->movil_id;
            $asignacion->movil_plan_id = $movil->movil_plan_id;
            $asignacion->comentario = $request->comentario;
            $asignacion->condiciones = $request->condiciones;
            $asignacion->nombre = $empleado->FullName;
            $asignacion->area = $empleado->NOMBRE_AREA;
            $asignacion->depto = $empleado->NOMBRE_DEPARTAMENTO;
            $asignacion->puesto = $empleado->NOMBRE_PUESTO;
            $asignacion->save();
            $movil->status_id = 2;
            $movil->asignado = 1;
            $movil->warehouse_id = 1;
            $movil->update();
        }
        return redirect('asignacionmovil')->with('info', "Asignación Actualizada correctamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AssignedMovil  $assignedMovil
     * @return \Illuminate\Http\Response
     */
    public function destroy(AssignedMovil $asignacionmovil)
    {
        $asignacionmovil->activo = 0;
        $asignacionmovil->update();

        $movil = Movil::find($asignacionmovil->movil_plan_id);
        $movil->asignado = 0;
        $movil->status_id = 1;
        $movil->warehouse_id = 4;
        $movil->update();

        return redirect('asignacionmovil')->with('info', "Equipo liberado correctamente");
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
            return view('movil.asignacion.index', compact('resultado'), compact('filtros'));
        }
        return redirect()->route('asignacionmovil.index')->with('info', "No hay resultados que coincidan")->withInput();
    }

    public function responsiva(AssignedMovil $asignacionmovil)
    {
        $view =  \View::make('movil.pdf.responsiva', compact('asignacionmovil'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        $pdf->setPaper('letter', 'portrait');
        return $pdf->download('Responsiva.pdf');
        // return $pdf->stream();
    }

    public function liberacion(AssignedMovil $asignacionmovil)
    {

        $view =  \View::make('movil.pdf.liberacion', compact('asignacionmovil'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        $pdf->setPaper('letter', 'portrait');
        return $pdf->download('liberacion.pdf');
        // return $pdf->stream();
    }

    public function reportAssignedMovils()
    {
        return Excel::download(new AssignedMovilsExport, 'asignacionmovil.xlsx');
    }
}
