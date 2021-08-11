@extends('adminlte::page')

@section('title', 'Equipos Moviles')

@section('content_header')
<h1>Equipos Moviles</h1>
@stop
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Asignaciones de Equipos</h3>
            <div class="card-tools">
                <a type="link" href="asignacionmovil/create" class="btn btn-tool"><i class="fas fa-plus"></i></a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @livewire('assigned-movil.assigned-movils-index')
         {{--    @include('partials.form.search',['target' => 'buscarmovilasig','filtro'=>$filtros])--}}
            @include('partials.flash')
            @if ($resultado->count() > 0)
            <table class="table">
                    <thead>
                        <th>IMEI</th>
                        <th>Linea</th>
                        <th>Condiciones</th>
                        <th>Status</th>
                        <th>Usuario</th>
                        <th>Equipo</th>
                        <th>Ultima modificación</th>
                        <th>Accion</th>
                    </thead>
                <tbody>
                    @foreach ($resultado as $movilasignado)
                                <tr>
                                    <td>{{ $movilasignado->movil->imei }}</td>
                                    <td>{{ $movilasignado->movil->lineatelefonica->lineatelefonica }}</td>
                                    <td>{{ $movilasignado->condiciones }}</td>
                                    <td>@if ($movilasignado->activo == 1)
                                            <span class="badge badge-success"> Activo </span>
                                        @else
                                            <span class="badge badge-danger"> baja </span>
                                        @endif
                                    </td>
                                    <td><b>Nomina:</b> {{ $movilasignado->nomina }}<br>
                                        <b>Nombre:</b> {{ $movilasignado->nombre }}<br>
                                    <b>Area:</b> {{ $movilasignado->area }}<br>
                                    <b>Departamento:</b> {{ $movilasignado->depto }}<br>
                                    <b>Puesto:</b> {{ $movilasignado->puesto }}</td>
                                    <td><b>Modelo:</b> {{ $movilasignado->movil->modelo }} <br>
                                    <b>N. Serie:</b> {{ $movilasignado->movil->noserie }} <br>
                                    <b>Marca:</b> {{ $movilasignado->movil->marca->marca }}</td>
                                    <td>{{ \Carbon\Carbon::parse($movilasignado->updated_at)->format('d/m/Y H:i') }}</td>
                                    <td>
                                        <a type="link" href="{{ route('responsiva_movil',$movilasignado->id) }}" class="btn btn-default"><i class="fas fa-file-pdf"></i></a>
                                    </td>
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



