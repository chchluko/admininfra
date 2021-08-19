@extends('adminlte::page')

@section('title', 'Claves telefonicas')

@section('content_header')
<h1>Claves telefonicas</h1>
@stop
@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Edicion de Asignación de Clave telefonica</h3>
        <div class="card-tools">
            <a type="link" href="/asignacionmovil" class="btn btn-tool"><i class="fas fa-list"></i></a>
        </div>
    </div>
    <!-- /.card-header -->
    @include('partials.alert')
    <div class="card-body">
        {!! Form::model($asignacionclafe, ['route'=>['asignacionclaves.update',$asignacionclafe],'method'=>'PUT']) !!}
        @csrf
        <div class="form-group row">
            {!! Form::Label('nomina', 'Usuario',['class' => 'col-sm-2 col-form-label']) !!}
            <div class="col-md-10">
                {!! Form::select('nomina', $empleados, null, ['class' => 'form-control datos']) !!}
                @if ($errors->has('nomina'))
                <span class="error-message">{{ $errors->first('nomina') }}</span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            {!! Form::Label('phone_key_id', 'Clave',['class' => 'col-sm-2 col-form-label']) !!}
            <div class="col-md-10">
                {!! Form::select('phone_key_id', $claves, null, ['class' => 'form-control datos']) !!}
                @if ($errors->has('phone_key_id'))
                <span class="error-message">{{ $errors->first('phone_key_id') }}</span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('alcance', 'Alcance') !!}
            {!! Form::textarea('alcance', null, ['class'=>'form-control','placeholder'=>'Opcional']) !!}
            @error('alcance')
            <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group row">@include('partials.form.comentario')</div>
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
