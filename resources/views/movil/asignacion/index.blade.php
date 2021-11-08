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
            <a type="link" href="reportassignedmovil" class="btn btn-tool"><i class="fas fa-download"></i></a>
                <a type="link" href="asignacionmovil/create" class="btn btn-tool"><i class="fas fa-plus"></i></a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @livewire('assigned-movil.assigned-movils-index')
            @include('partials.flash')
        </div>
        <!-- /.card-body -->
        <div class="clearfix card-footer">
        </div>
      </div>
@stop

@section('css')
    <!--link rel="stylesheet" href="/css/admin_custom.css"-->
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop



