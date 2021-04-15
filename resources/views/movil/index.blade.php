@extends('adminlte::page')

@section('title', 'Equipos Moviles')

@section('content_header')
<h1>Equipos Moviles</h1>
@stop
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Equipos</h3>
        <div class="card-tools">
            <a type="link" href="movil/create" class="btn btn-tool"><i class="fas fa-plus"></i></a>
        </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @include('partials.form.search',['target' => 'buscarmovil','filtro'=>$filtros])
            @include('partials.flash')
            @if ($resultado->count() > 0)
            <table class="table">
                <thead>
                    <th>Teléfono</th>
                    <th>Nombre del plan</th>
                    <th>IMEI</th>
                    <th>Tipo</th>
                    <th>Status</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Número de Serie</th>
                    <th>Modificado</th>
                    <th>Accion</th>
                </thead>
                <tbody>
            @foreach ($resultado as $movil)
                        <tr>
                            <td>{{ $movil->plan->lineatelefonica }}</td>
                            <td>{{ $movil->plan->tipo->tipo }}</td>
                            <td>{{ $movil->imei }}</td>
                            <td>{{ $movil->tipo->tipo }}</td>
                            <td>{{ $movil->status->status }}</td>
                            <td>{{ $movil->marca->marca }}</td>
                            <td>{{ $movil->modelo }}</td>
                            <td>{{ $movil->noserie }}</td>
                            <td>{{ \Carbon\Carbon::parse($movil->updated_at)->format('d/m/Y') }}</td>
                            <td></td>
                        </tr>

            @endforeach                </tbody>
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



