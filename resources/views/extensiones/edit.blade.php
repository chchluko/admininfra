@extends('adminlte::page')

@section('title', 'Eextensiones')

@section('content_header')
<h1>Extensiones</h1>
@stop
@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Editar una Asignacion de Extension</h3>
      <div class="card-tools">
        <a type="link" href="/extensiones" class="btn btn-tool"><i class="fas fa-list"></i></a>
    </div>
    </div>
    <!-- /.card-header -->


    <div class="card-body">@include('partials.alert')
        {!! Form::model($extensione, ['route'=>['extensiones.update',$extensione],'method'=>'PUT']) !!}
            @csrf
            <div class="form-group row">
                {!! Form::Label('ubicacion_id', 'Ubicación',['class' => 'col-sm-2 col-form-label']) !!}
                <div class="col-md-10">
                    {!! Form::select('ubicacion_id', $ubicaciones, null, ['class' => 'form-control datos']) !!}
                    @if ($errors->has('ubicacion_id'))
                        <span class="error-message">{{ $errors->first('ubicacion_id') }}</span>
                    @endif
                </div>
            </div>
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
                <div class="col-4">
                        {!! Form::label('extension', 'Extensión') !!}
                        {!! Form::text('extension', null, ['class'=>'form-control','placeholder'=>'######']) !!}
                        @error('clave')
                        <span class="error-message">{{ $message }}</span>
                        @enderror
                  </div>
                  <div class="col-4">
                        {!! Form::label('modelo', 'Modelo') !!}
                        {!! Form::text('modelo', null, ['class'=>'form-control','placeholder'=>'######']) !!}
                        @error('clave')
                        <span class="error-message">{{ $message }}</span>
                        @enderror
                  </div>
                <div class="col-4">
                    {!! Form::Label('type_id', 'Tipo') !!}
                        {!! Form::select('type_id', $tipos, null, ['class' => 'form-control']) !!}
                        @if ($errors->has('type_id'))
                            <span class="error-message">{{ $errors->first('type_id') }}</span>
                        @endif
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
    <script>     $(document).ready(function() {
        $('.datos').select2();
    }); </script>
@stop
