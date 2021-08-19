@extends('adminlte::page')

@section('title', 'Claves telefonicas')

@section('content_header')
<h1>Claves telefonicas</h1>
@stop
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Claves telefonicas</h3>
                <div class="card-tools">
                    <a type="link" href="clavestelefonicas/create" class="btn btn-tool"><i class="fas fa-plus"></i></a>
                </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @livewire('phone-key.phone-keys-index')
            @include('partials.flash')
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



