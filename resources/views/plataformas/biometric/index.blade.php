@extends('adminlte::page')

@section('title', 'Hardware Plataformas')

@section('content_header')
<h1>Hardware Plataformas</h1>
@stop
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Control de Acceso</h3>
        <div class="card-tools">
            <a type="link" href="{{ route('biometricos.create') }}" class="btn btn-tool"><i class="fas fa-plus"></i></a>
        </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @include('partials.flash')
            @if ($resultado->count() > 0)
            <table class="table">
                <thead>
                    <th>Tipo</th>
                    <th>IP</th>
                    <th>Marca</th>
                    <th>Datacenter</th>
                    <th>Modelo</th>
                    <th>Número de Serie</th>
                    <th>Accion</th>
                </thead>
                <tbody>
            @foreach ($resultado as $hardware)
                        <tr>
                            <td>{{ $hardware->tipoplataforma->tipo }}</td>
                            <td>{{ $hardware->ip }}</td>
                            <td>{{ $hardware->marca->marca }}</td>
                            <td>{{ $hardware->datacenter->name }}</td>
                            <td>{{ $hardware->modelo }}</td>
                            <td>{{ $hardware->noserie }}</td>
                            <td class="py-0 text-right align-middle">
                                <div class="btn-group btn-group-sm">
                                  <a href="{{ route('biometricos.edit',$hardware->id ) }}" class="btn btn-default"><i class="fas fa-edit"></i></a>
                                  <a href="{{ route('biometricos.show',$hardware->id ) }}" class="btn btn-default"><i class="fas fa-eye"></i></a>
                                </div>
                              </td>
                        </tr>

            @endforeach                </tbody>
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



