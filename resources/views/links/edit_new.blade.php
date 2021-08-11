@extends('adminlte::page')

@section('title', 'Enlaces & Lineas')

@section('content_header')
<h1>Enlaces & Lineas</h1>
@stop
@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Edición de Enlace</h3>
        <div class="card-tools">
            <a type="link" href="/enlaces" class="btn btn-tool"><i class="fas fa-list"></i></a>
        </div>
    </div>
    <!-- /.card-header -->


    <div class="card-body">@include('partials.alert')
        {!! Form::model($enlace, ['route'=>['enlaces.update',$enlace],'method'=>'PUT']) !!}
        <div class="form-group row">@include('partials.form.ubicacion')</div>
        <div class="form-group row">@include('partials.form.provider')</div>
        <div class="form-group row">@include('partials.form.status')</div>
        <div class="form-group row">@include('partials.form.tipo')</div>
        <div class="form-group row">
            <div class="col-6">
                @include('links.common.referencia')
            </div>
            <div class="col-6">
                @include('links.common.brandwidth')
            </div>
        </div>
        <div class="form-group row">
            <div class="col-4">
                @include('links.common.plazo')
            </div>
            <div class="col-4">
                @include('links.common.costo')
            </div>
            <div class="col-4">
                @include('links.common.contratacion')
            </div>
        </div>
        @include('partials.form.comentario')
    </div>
    <!-- /.card-body -->
    <div class="clearfix card-footer">
        <button type="submit" class="btn btn-info">Actualizar</button>
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
