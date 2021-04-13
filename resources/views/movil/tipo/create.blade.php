@extends('adminlte::page')

@section('title', 'Equipos Moviles')

@section('content_header')
<h1>Equipos Moviles</h1>
@stop
@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Alta de Tipo de Equipo</h3>
      <div class="card-tools">
        <a type="link" href="/moviltipo" class="btn btn-tool"><i class="fas fa-list"></i></a>
    </div>
    </div>
    <!-- /.card-header -->


    <div class="card-body">@include('partials.alert')
          <form action="{{ route('moviltipo.store') }}" method="POST">
            @csrf
            <div class="form-group row">
                <label for="tipo">Tipo de Equipo</label>
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
    <script></script>
@stop
