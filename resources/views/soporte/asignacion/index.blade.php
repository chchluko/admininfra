@extends('adminlte::page')

@section('title', 'Hardware Soporte')

@section('content_header')
<h1>Hardware Soporte</h1>
@stop


@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Asignaciones de Hardware</h3>
            <div class="card-tools">
                <a type="link" href="asignacionsoporte/create" class="btn btn-tool"><i class="fas fa-plus"></i></a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @include('partials.form.search',['target' => 'buscarsupportasig','filtro'=>$filtros ])
            @include('partials.flash')
            @if ($resultado->count() > 0)
            <table class="table">
                <thead>
                    <th>Hardware</th>
                    <th>Condiciones</th>
                    <th>Status</th>
                    <th>Usuario</th>
                    <th>Ubicación</th>
                    <th>Ultima modificación</th>
                    <th>Accion</th>
                </thead>
                <tbody>
            @foreach ($resultado as $soporteasignada)
                        <tr>
                            <td><b>Inventario:</b> {{ $soporteasignada->inventario }}<br>
                                <b>Modelo:</b> {{ $soporteasignada->soporte->modelo }}<br>
                                <b>No. Serie:</b> {{ $soporteasignada->soporte->noserie }}<br>
                                <b>Tipo:</b> {{ $soporteasignada->soporte->tipo->tipo }}<br>
                                <b>Marca:</b> {{ $soporteasignada->soporte->marca->marca }}<br>
                            </td>
                            <td>{{ $soporteasignada->condiciones }}</td>
                            <td>@if ($soporteasignada->activo == 1)
                                    <span class="badge badge-success"> Activo </span>
                                @else
                                    <span class="badge badge-danger"> baja </span>
                                @endif
                            </td>
                            <td><b>Nomina:</b> {{ $soporteasignada->nomina }}<br>
                                <b>Nombre:</b> {{ $soporteasignada->nombre }}<br>
                                <b>Area:</b> {{ $soporteasignada->area }}<br>
                                <b>Departamento:</b> {{ $soporteasignada->depto }}<br>
                                <b>Puesto:</b> {{ $soporteasignada->puesto }}</td>
                            <td width="200px">{{ $soporteasignada->ubicacion->NOMBRE_AREA }} <br>
                                {{ $soporteasignada->ubicacion->FullAddress }}
                            </td>
                            <td>{{ \Carbon\Carbon::parse($soporteasignada->updated_at)->format('d/m/Y H:i') }}</td>
                            <td><a type="link" href="{{ route('responsiva_soporte',$soporteasignada->id) }}" class="btn btn-default"><i class="fas fa-file-pdf"></i></a></td>
                        </tr>
            @endforeach
                </tbody>
            </table>
            @endif
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            @include('partials.paginacion')
        </div>
      </div>
@stop

@section('css')
    <!--link rel="stylesheet" href="/css/admin_custom.css"-->
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop



