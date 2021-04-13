@extends('adminlte::page')

@section('title', 'Equipos Moviles')

@section('content_header')
<h1>Equipos Moviles</h1>
@stop
@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Alta de Plan</h3>
      <div class="card-tools">
        <a type="link" href="/movilplan" class="btn btn-tool"><i class="fas fa-list"></i></a>
      </div>
    </div>
    <!-- /.card-header -->

@include('partials.alert')
    <div class="card-body">
          <form action="{{ route('movilplan.store') }}" method="POST">
            @csrf
                <div class="form-group row">
                    {!! Form::Label('plantype_id', 'Nombre del Plan',['class' => 'col-sm-2 col-form-label']) !!}
                    <div class="col-md-10">
                        {!! Form::select('plantype_id', $plantypes, $id ?? 0, ['class' => 'form-control']) !!}
                        @if ($errors->has('plantype_id'))
                            <span class="error-message">{{ $errors->first('plantype_id') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-6">
                        <label for="lineatelefonica">Linea Telefonica</label>
                          <input type="text" name="lineatelefonica" class="form-control {{ $errors->has('lineatelefonica') ? 'field-error' : '' }}" id="modelo"  placeholder="#########" value="{{ old('lineatelefonica') }}">
                          @if ($errors->has('lineatelefonica'))
                                <span class="error-message">{{ $errors->first('lineatelefonica') }}</span>
                          @endif
                        </div>
                    <div class="col-6">
                        <label for="fechadeinicio">Fecha de Inicio</label>
                        <input type="date" name="fechadeinicio" class="form-control {{ $errors->has('fechadeinicio') ? 'field-error' : '' }}" id="fechadeinicio" value="{{ old('fechadeinicio') }}">
                        @if ($errors->has('fechadeinicio'))
                              <span class="error-message">{{ $errors->first('fechadeinicio') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-6">
                        <label for="plazo">Duración (meses)</label>
                          <input type="text" name="plazo" class="form-control {{ $errors->has('plazo') ? 'field-error' : '' }}" id="modelo"  placeholder="#########" value="{{ old('plazo') }}">
                          @if ($errors->has('plazo'))
                                <span class="error-message">{{ $errors->first('plazo') }}</span>
                          @endif
                        </div>
                    <div class="col-6">
                        <label for="fechadetermino">Fecha de Termino</label>
                        <input type="date" name="fechadetermino" class="form-control {{ $errors->has('fechadetermino') ? 'field-error' : '' }}" id="fechadetermino" value="{{ old('fechadetermino') }}">
                        @if ($errors->has('fechadetermino'))
                              <span class="error-message">{{ $errors->first('fechadetermino') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-6">
                    <label for="marcacioncorta">Marcacion Corta</label>
                      <input type="text" name="marcacioncorta" class="form-control {{ $errors->has('marcacioncorta') ? 'field-error' : '' }}" id="odelo" placeholder="Introduzca texto" value="{{ old('marcacioncorta') }}">
                      @if ($errors->has('marcacioncorta'))
                            <span class="error-message">{{ $errors->first('marcacioncorta') }}</span>
                      @endif
                    </div>
                    <div class="col-6">
                    <label for="costo">Costo</label>
                        <input type="text" name="costo" class="form-control {{ $errors->has('costo') ? 'field-error' : '' }}" id="costo" placeholder="" value="{{ old('costo') }}">
                        @if ($errors->has('costo'))
                            <span class="error-message">{{ $errors->first('costo') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="serviciosadicionales">Servicios adicionales</label>
                      <input type="text" name="serviciosadicionales" class="form-control {{ $errors->has('serviciosadicionales') ? 'field-error' : '' }}" id="serviciosadicionales" placeholder="Introduzca tento aqui" value="{{ old('serviciosadicionales') }}">
                      @if ($errors->has('serviciosadicionales'))
                        <span class="error-message">{{ $errors->first('serviciosadicionales') }}</span>
                      @endif
                </div>
                <div class="form-group row">
                    <label for="cuentaasignada">Cuenta Asignada</label>
                      <input type="text" name="cuentaasignada" class="form-control {{ $errors->has('cuentaasignada') ? 'field-error' : '' }}" id="cuentaasignada" placeholder="Introduzca tento aqui" value="{{ old('cuentaasignada') }}">
                      @if ($errors->has('cuentaasignada'))
                        <span class="error-message">{{ $errors->first('cuentaasignada') }}</span>
                      @endif
                </div>
                @include('partials.form.comentario')
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
    <script> console.log('Hi!'); </script>
@stop
