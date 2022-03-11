@extends('adminlte::page')

@section('title', 'Hardware Plataformas')

@section('content_header')
<h1>Hardware Plataformas</h1>
@stop
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Routers</h3>
        <div class="card-tools">
            <a type="link" href="routers/create" class="btn btn-tool"><i class="fas fa-plus"></i></a>
        </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @livewire('platform.routers-index')
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



