@extends('adminlte::page')

@section('title', 'Equipos Moviles')

@section('content_header')
<h1>Equipos Moviles</h1>
@stop
@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Alta de Equipo Movil</h3>
      <div class="card-tools">
        <a type="link" href="/movil" class="btn btn-tool"><i class="fas fa-list"></i></a>
    </div>
    </div>
    <!-- /.card-header -->

@include('partials.alert')
    <div class="card-body">
          <form action="{{ route('movil.store') }}" method="POST">
            @csrf
            <div class="form-group row">
                {!! Form::Label('movil_plan_id', 'Linea telefonica',['class' => 'col-sm-2 col-form-label']) !!}
                <div class="col-md-10">
                    {!! Form::select('movil_plan_id', $lineas, $id ?? 0, ['class' => 'form-control']) !!}
                    @if ($errors->has('movil_plan_id'))
                        <span class="error-message">{{ $errors->first('movil_plan_id') }}</span>
                    @endif
                </div>
            </div>
                <div class="form-group row">@include('partials.form.tipo')</div>
                <div class="form-group row">@include('partials.form.status')</div>
                <div class="form-group row">
                    <div class="col-6">                        <label for="imei">IMEI</label>
                        <input type="text" name="imei" class="form-control {{ $errors->has('imei') ? 'field-error' : '' }}" id="modelo"  placeholder="#########" value="{{ old('imei') }}">
                        @if ($errors->has('imei'))
                                <span class="error-message">{{ $errors->first('imei') }}</span>
                        @endif
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
    <div class="card-footer clearfix">
        <button type="submit" class="btn btn-info">Guardar</button>
        <a type="link" href="{{ url()->previous() }}" class="btn btn-default float-right">Cancelar</a>
    </div>
</form>
  </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script></script>
@stop
