@extends('adminlte::page')

@section('title', 'Equipos Moviles')

@section('content_header')
<h1>Equipos Moviles</h1>
@stop
@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Edicion de Asignación de Equipo Movil</h3>
      <div class="card-tools">
        <a type="link" href="/asignacionmovil" class="btn btn-tool"><i class="fas fa-list"></i></a>
      </div>
    </div>
    <!-- /.card-header -->

@include('partials.alert')
    <div class="card-body">
    {!! Form::model($asignacionmovil, ['route'=>['asignacionmovil.update',$asignacionmovil],'method'=>'PUT']) !!}
                <div class="form-group row">@include('partials.form.empleado')</div>
                <div class="form-group row">
                    {!! Form::Label('movil_id', 'Equipo Telefonico',['class' => 'col-sm-2 col-form-label']) !!}
                    <div class="col-md-10">
                        {!! Form::select('movil_id', $movils, null, ['class' => 'form-control datos']) !!}
                        @if ($errors->has('movil_id'))
                            <span class="error-message">{{ $errors->first('movil_id') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::Label('condiciones', 'Condiciones de Entrega',['class' => 'col-sm-2 col-form-label']) !!}
                    <div class="col-md-10">
                    <textarea class="form-control {{ $errors->has('condiciones') ? 'field-error' : '' }}" rows="3"
                        name="condiciones" placeholder="Opcional">{{ old('condiciones') }}</textarea>
                    @if ($errors->has('condiciones'))
                        <span class="error-message">{{ $errors->first('condiciones') }}</span>
                    @endif
                    </div>
                </div>
                <div class="form-group row">@include('partials.form.comentario')</div>
    </div>
    <!-- /.card-body -->
    <div class="clearfix card-footer">
        <button type="submit" class="btn btn-info">Guardar</button>
        <a type="link" href="{{ url()->previous() }}" class="float-right btn btn-default">Cancelar</a>
        {!! Form::open( ['route'=>['asignacionmovil.destroy',$asignacionmovil],'method'=>'DELETE']) !!}
            <button type="submit" class="float-right btn btn-warning">Liberar</button>
        {!! Form::close() !!}
    </div>
{!! Form::close() !!}
  </div>
{{-- @livewire('movil.movils-unlock',['movil'=>$asignacionmovil->movil_id]) --}}
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
