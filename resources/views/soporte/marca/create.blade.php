@extends('adminlte::page')

@section('title', 'Hardware Soporte')

@section('content_header')
<h1>Hardware Soporte</h1>
@stop
@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Alta de Marca Hardware</h3>
      <div class="card-tools">
        <a type="link" href="/soportemarca" class="btn btn-tool"><i class="fas fa-list"></i></a>
      </div>
    </div>
    <!-- /.card-header -->


    <div class="card-body">@include('partials.alert')
          <form action="{{ route('soportemarca.store') }}" method="POST">
            @csrf
                <div class="form-group row">
                    <label for="marca">Marca</label>
                      <input type="text" name="marca" class="form-control {{ $errors->has('marca') ? 'field-error' : '' }}" id="marca" placeholder="Introduzca tento aqui" value="{{ old('marca') }}">
                      @if ($errors->has('marca'))
                        <span class="error-message">{{ $errors->first('marca') }}</span>
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
