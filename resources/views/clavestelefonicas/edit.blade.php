@extends('adminlte::page')

@section('title', 'Claves telefonicas')

@section('content_header')
<h1>Claves telefonicas</h1>
@stop
@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Alta de clave telefonica</h3>
        <div class="card-tools">
            <a type="link" href="/clavestelefonicas" class="btn btn-tool"><i class="fas fa-list"></i></a>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">@include('partials.alert')
        {!! Form::model($clavestelefonica, ['route'=>['clavestelefonicas.update',$clavestelefonica],'method'=>'PUT']) !!}
        @csrf
        <div class="form-group row">
            {!! Form::label('clave', 'Clave teléfonica') !!}
            {!! Form::text('clave', null, ['class'=>'form-control','placeholder'=>'######']) !!}
            @error('clave')
            <span class="error-message">{{ $message }}</span>
            @enderror
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
    console.log('Hi!');
</script>
@stop
