@extends('adminlte::page')

@section('title', 'Extensiones')

@section('content_header')
<h1>Extensiones</h1>
@stop
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Extensiones (Asignaciones)</h3>
        <div class="card-tools">
            <a type="link" href="extensiones/create" class="btn btn-tool"><i class="fas fa-plus"></i></a>
        </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @livewire('extension.extensions-index')
        {{--     @include('partials.form.search',['target' => 'buscarextension','filtro'=>$filtros ])--}}
            @include('partials.flash')
            @if ($resultado->count() > 0)
            <table class="table">
                <thead>
                    <th>Tipo</th>
                    <th>Status</th>
                    <th>Extension</th>
                    <th>Modelo</th>
                    <th>Usuario</th>
                    <th>Ubicacion</th>
                    <th>Modificado</th>
                    <th>Accion</th>
                </thead>
                <tbody>
            @foreach ($resultado as $extension)
                        <tr>
                            <td>{{ $extension->tipo->tipo }}</td>
                            <td>@if ($extension->activo == 1)
                                <span class="badge badge-success"> Activa </span>
                            @else
                                <span class="badge badge-info"> Inactiva </span>
                            @endif
                            </td>
                            <td>{{ $extension->extension }}</td>
                            <td>{{ $extension->modelo }}</td>
                            <td>Nomina: {{ $extension->nomina }}<br>
                                Nombre: {{ $extension->nombre }}<br>
                            Area: {{ $extension->area }}<br>
                            Departamento: {{ $extension->depto }}<br>
                            Puesto: {{ $extension->puesto }}</td>
                            <td>{{ $extension->ubicacion->FullAddress }}</td>
                            <td>{{ \Carbon\Carbon::parse($extension->updated_at)->format('d/m/Y') }}</td>
                            <td></td>
                        </tr>
            @endforeach
                </tbody>
            </table>
        @endif
        </div>
        <!-- /.card-body -->
        <div class="clearfix card-footer">
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



