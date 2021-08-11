@extends('adminlte::page')

@section('title', 'Equipos Moviles')

@section('content_header')
<h1>Equipos Moviles</h1>
@stop
@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Edicion de Equipo Movil</h3>
      <div class="card-tools">
        <a type="link" href="/movil" class="btn btn-tool"><i class="fas fa-list"></i></a>
    </div>
    </div>
    <!-- /.card-header -->

@include('partials.alert')
    <div class="card-body">
        {!! Form::model($movil, ['route'=>['movil.update',$movil],'method'=>'PUT']) !!}
            @csrf
            <div class="form-group row">
                {!! Form::Label('movil_plan_id', 'Linea telefonica',['class' => 'col-sm-2 col-form-label']) !!}
                <div class="col-md-10">
                    {!! Form::select('movil_plan_id', $lineas, null, ['class' => 'form-control']) !!}
                    @if ($errors->has('movil_plan_id'))
                        <span class="error-message">{{ $errors->first('movil_plan_id') }}</span>
                    @endif
                </div>
            </div>
                <div class="form-group row">@include('partials.form.tipo')</div>
                <div class="form-group row">@include('partials.form.status')</div>
                <div class="form-group row">
                    <div class="col-6">
                        {!! Form::label('imei', 'IMEI') !!}
                        {!! Form::text('imei', null, ['class'=>'form-control','placeholder'=>'######']) !!}
                        @error('imei')
                        <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                        <div class="col-6">@include('partials.form.modelo')</div>

                </div>
                <div class="form-group row">
                    <div class="col-6">@include('partials.form.marca')</div>
                    <div class="col-6">@include('partials.form.serie')</div>
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
    <script></script>
@stop
