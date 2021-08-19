@extends('adminlte::page')

@section('title', 'Claves telefonicas')

@section('content_header')
<h1>Claves telefonicas</h1>
@stop
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Asignacion de Claves telefonicas</h3>
            <div class="card-tools">
                <a type="link" href="asignacionclaves/create" class="btn btn-tool"><i class="fas fa-plus"></i></a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
           {{--  @include('partials.form.search',['target' => 'buscarclaveasignada','filtro'=>$filtros]) --}}
            @livewire('assigned-key.assigned-keys-index')
            @include('partials.flash')
            @if ($resultado->count() > 0)
            <table class="table">
                <thead>
                    <th>Clave</th>
                    <th>Alcance</th>
                    <th>Status</th>
                    <th>Usuario</th>
                    <th>Ultima modificacion</th>
                    <th>Accion</th>
                </thead>
                <tbody>
            @foreach ($resultado as $clavesasignada)
                        <tr>
                            <td>{{ $clavesasignada->clave }}</td>
                            <td>{{ $clavesasignada->alcance }}</td>
                            <td>@if ($clavesasignada->activo == 1)
                                    <span class="badge badge-success"> Activo </span>
                                @else
                                    <span class="badge badge-danger"> Inactivo </span>
                                @endif
                            </td>
                            <td>Nomina: {{ $clavesasignada->nomina }}<br>
                                Nombre: {{ $clavesasignada->nombre }}<br>
                            Area: {{ $clavesasignada->area }}<br>
                            Departamento: {{ $clavesasignada->depto }}<br>
                            Puesto: {{ $clavesasignada->puesto }}</td>
                            <td>{{ \Carbon\Carbon::parse($clavesasignada->updated_at)->format('d/m/Y H:i') }}</td>
                            <td>

                            </td>
                        </tr>
            @endforeach
                </tbody>
            </table>
            @endif
        </div>
        <!-- /.card-body -->
        <div class="clearfix card-footer">
          {{--   @include('partials.paginacion')--}}
        </div>
      </div>
@stop

@section('css')
    <!--link rel="stylesheet" href="/css/admin_custom.css"-->
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop



