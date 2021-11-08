@extends('adminlte::page')

@section('title', 'Hardware Plataformas')

@section('content_header')
<h1>Hardware Plataformas</h1>
@stop
@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Edicion de Centro de Datos</h3>
        <div class="card-tools">
            <a type="link" href="{{ route('datacenters.index') }}" class="btn btn-tool"><i class="fas fa-list"></i></a>
        </div>
    </div>
    <!-- /.card-header -->


    <div class="card-body">@include('partials.alert')
        {!! Form::model($datacenter, ['route'=>['datacenters.update',$datacenter],'method'=>'PUT']) !!}
        <div class="form-group row">
            {!! Form::label('name', 'Nombre') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
            @error('name')
            <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group row">
            {!! Form::label('direccion', 'Dirección',['class'=>'col-form-label']) !!}
            {!! Form::textarea('direccion', null, ['class'=>'form-control','placeholder'=>'']) !!}
            @error('direccion')
            <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group row">@include('partials.form.comentario')</div>
    </div>
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
