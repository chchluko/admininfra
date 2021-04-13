@extends('adminlte::page')

@section('title', 'Enlaces & Lineas')

@section('content_header')
<h1>Enlaces & Lineas</h1>
@stop
@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Alta de Tipo de Enlace</h3>
      <dic class="card-tools">
        <a type="link" href="/enlacestipos" class="btn btn-tool"><i class="fas fa-list"></i></a>
      </dic>
    </div>
    <!-- /.card-header -->


    <div class="card-body">
        @include('partials.alert')
          <form action="{{ route('enlacestipos.store') }}" method="POST">
            @csrf
                <div class="form-group row">
                    <label for="tipo">Tipo de enlace</label>
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
