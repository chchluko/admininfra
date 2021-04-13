@extends('adminlte::page')

@section('title', 'Extensiones')

@section('content_header')
<h1>Extensiones</h1>
@stop
@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Alta de Tipo de Extensión</h3>
      <dic class="card-tools">
        <a type="link" href="/extensionestipo" class="btn btn-tool"><i class="fas fa-list"></i></a>
      </dic>
    </div>
    <!-- /.card-header -->

@include('partials.alert')
    <div class="card-body">
          <form action="{{ route('extensionestipo.store') }}" method="POST">
            @csrf
                <div class="form-group row">
                    <label for="tipo">Tipo de extensión</label>
                      <input type="text" name="tipo" class="form-control {{ $errors->has('tipo') ? 'field-error' : '' }}" id="tipo" placeholder="Introduzca tento aqui" value="{{ old('tipo') }}">
                      @if ($errors->has('tipo'))
                        <span class="error-message">{{ $errors->first('tipo') }}</span>
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
    <script> console.log('Hi!'); </script>
@stop
