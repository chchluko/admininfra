@extends('adminlte::page')

@section('title', 'Equipos Moviles')

@section('content_header')
<h1>Equipos Moviles</h1>
@stop
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Planes Moviles</h3>
            <div class="card-tools">
                <a type="link" href="movilplan/create" class="btn btn-tool"><i class="fas fa-plus"></i></a>
              </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @include('partials.flash')
            <table class="table">
                <thead>
                    <th>Plan</th>
                    <th>Linea Telefonica</th>
                    <th>Marcación Corta</th>
                    <th>Fecha de Termino</th>
                    <th>Costo del Plan</th>
                    <th>Cuenta Asignada</th>
                    <th>Servicios adicionales</th>
                    <th>Ultima modificacion</th>
                    <th>Accion</th>
                </thead>
                <tbody>
                    @foreach ($resultado as $plan)
                                <tr>
                                    <td>{{ $plan->tipo->tipo }}</td>
                                    <td>{{ $plan->lineatelefonica }}</td>
                                    <td>{{ $plan->marcacioncorta }}</td>
                                    <td>{{ \Carbon\Carbon::parse($plan->fechadetermino)->format('d/m/Y') }}</td>
                                    <td>{{ $plan->costo }}</td>
                                    <td>{{ $plan->cuentaasignada }}</td>
                                    <td>{{ $plan->serviciosadicionales }}</td>
                                    <td>{{ \Carbon\Carbon::parse($plan->updated_at)->format('d/m/Y H:i') }}</td>
                                    <td></td>
                                </tr>
                    @endforeach
                </tbody>
            </table>
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



