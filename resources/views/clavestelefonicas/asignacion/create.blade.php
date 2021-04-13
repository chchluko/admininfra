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
        <a type="link" href="/asignacionclaves" class="btn btn-tool"><i class="fas fa-list"></i></a>
      </div>
    </div>
    <!-- /.card-header -->


    <div class="card-body">@include('partials.alert')
          <form action="{{ route('asignacionclaves.store') }}" method="POST">
            @csrf
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
                {!! Form::Label('phone_key_id', 'Clave',['class' => 'col-sm-2 col-form-label']) !!}
                <div class="col-md-10">
                    {!! Form::select('phone_key_id', $claves, 0, ['class' => 'form-control datos']) !!}
                    @if ($errors->has('phone_key_id'))
                        <span class="error-message">{{ $errors->first('phone_key_id') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                    <label for="alcance">Alcance</label>
                    <textarea class="form-control {{ $errors->has('alcance') ? 'field-error' : '' }}"
                        rows="3" name="alcance" placeholder="Defina el alcance de la clave asignada">{{ old('alcance') }}</textarea>
                      @if ($errors->has('alcance'))
                          <span class="error-message">{{ $errors->first('alcance') }}</span>
                      @endif
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
    <script>
    $(document).ready(function() {
        $('.datos').select2();
    });
    </script>
@stop
