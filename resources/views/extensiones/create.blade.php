@extends('adminlte::page')

@section('title', 'Eextensiones')

@section('content_header')
<h1>Eextensiones</h1>
@stop
@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Asignar una Extension</h3>
      <div class="card-tools">
        <a type="link" href="/enlaces" class="btn btn-tool"><i class="fas fa-list"></i></a>
    </div>
    </div>
    <!-- /.card-header -->

@include('partials.alert')
    <div class="card-body">
          <form action="{{ route('extensiones.store') }}" method="POST">
            @csrf
            <div class="form-group row">
                {!! Form::Label('ubicacion_id', 'Ubicación',['class' => 'col-sm-2 col-form-label']) !!}
                <div class="col-md-10">
                    {!! Form::select('ubicacion_id', $ubicaciones, 0, ['class' => 'form-control datos']) !!}
                    @if ($errors->has('ubicacion_id'))
                        <span class="error-message">{{ $errors->first('ubicacion_id') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                {!! Form::Label('nomina', 'Usuario',['class' => 'col-sm-2 col-form-label']) !!}
                <div class="col-md-10">
                    {!! Form::select('nomina', $empleados, 0, ['class' => 'form-control datos']) !!}
                    @if ($errors->has('nomina'))
                        <span class="error-message">{{ $errors->first('nomina') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <div class="col-4">
                    <label for="extension">Extensión</label>
                    <input type="text" name="extension" class="form-control {{ $errors->has('extension') ? 'field-error' : '' }}" id="extension" placeholder="Extensión" value="{{ old('extension') }}">
                    @if ($errors->has('extension'))
                      <span class="error-message">{{ $errors->first('extension') }}</span>
                    @endif
                  </div>
                  <div class="col-4">
                      <label for="modelo">Modelo</label>
                      <input type="text" name="modelo" class="form-control {{ $errors->has('modelo') ? 'field-error' : '' }}" id="modelo" placeholder="Moledo del teléfono" value="{{ old('modelo') }}">
                      @if ($errors->has('modelo'))
                        <span class="error-message">{{ $errors->first('modelo') }}</span>
                      @endif
                  </div>
                <div class="col-4">
                    {!! Form::Label('extension_type_id', 'Tipo') !!}
                        {!! Form::select('extension_type_id', $tipos, 0, ['class' => 'form-control']) !!}
                        @if ($errors->has('extension_type_id'))
                            <span class="error-message">{{ $errors->first('extension_type_id') }}</span>
                        @endif
                </div>
            </div>
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
    <script>     $(document).ready(function() {
        $('.datos').select2();
    }); </script>
@stop
