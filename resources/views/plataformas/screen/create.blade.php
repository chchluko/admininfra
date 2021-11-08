@extends('adminlte::page')

@section('title', 'Hardware Plataformas')

@section('content_header')
<h1>Hardware Plataformas</h1>
@stop
@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Alta de Pantalla</h3>
        <div class="card-tools">
            <a type="link" href="{{ route('screens.index') }}" class="btn btn-tool"><i class="fas fa-list"></i></a>
        </div>
    </div>
    <!-- /.card-header -->

    <div class="card-body">@include('partials.alert')
        {!! Form::open(['route'=>'screens.store']) !!}
        <div class="form-group row">@include('partials.form.tipo')</div>
        <div class="form-group row">@include('partials.form.status')</div>
        <div class="form-group row">@include('plataformas.common.datacenter')</div>
        <div class="form-group row">
            <div class="col-4">
                @include('partials.form.marca')
            </div>
            <div class="col-4">
                @include('partials.form.modelo')
            </div>
            <div class="col-4">
                @include('partials.form.serie')
            </div>
        </div>
        <div class="form-group row">@include('partials.form.comentario')</div>
    </div>
    <!-- /.card-body -->
    <div class="clearfix card-footer">
        <button type="submit" class="btn btn-info">Guardar</button>
        <a type="link" href="{{ url()->previous() }}" class="float-right btn btn-default">Cancelar</a>
    </div>
    {!! Form::close() !!}
</div>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    $(document).ready(function() {
        $('.datos').select2();
    });
</script>
@stop
