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
            @livewire('movil-plan.movil-plans-index')
         {{--     @include('partials.form.search',['target' => 'buscarplan','filtro'=> $filtros ])--}}
            @include('partials.flash')
            @if ($resultado->count() > 0)
            <table class="table">
                <thead>
                    <th>Plan</th>
                    <th>Linea Telefonica</th>
                    <th>Fecha de Inicio</th>
                    <th>Plazo</th>
                    <th>Fecha de Termino</th>
                    <th>Costo del Plan</th>
                    <th>Ultima modificacion</th>
                    <th>Accion</th>
                </thead>
                <tbody>
                    @foreach ($resultado as $plan)
                                <tr>
                                    <td>{{ $plan->tipo->tipo }}</td>
                                    <td>{{ $plan->lineatelefonica }}</td>
                                    <td>{{ \Carbon\Carbon::parse($plan->inicio)->format('d/m/Y') }}</td>
                                    <td>{{ $plan->plazo }}</td>
                                    <td>{{ \Carbon\Carbon::parse($plan->fechadetermino)->format('d/m/Y') }}</td>
                                    <td>{{ $plan->costo }}</td>
                                    <td>{{ \Carbon\Carbon::parse($plan->updated_at)->format('d/m/Y H:i') }}</td>
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



