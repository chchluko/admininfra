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
        <a type="link" href="/clavestelefonicas" class="btn btn-tool"><i class="fas fa-list"></i></a>
    </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">@include('partials.alert')
          <form action="{{ route('clavestelefonicas.store') }}" method="POST">
            @csrf
                <div class="form-group row">
                    <label for="clave">Clave teléfonica</label>
                      <input type="text" name="clave" class="form-control {{ $errors->has('clave') ? 'field-error' : '' }}" id="clave" placeholder="Introduzca la clave" value="{{ old('clave') }}">
                      @if ($errors->has('clave'))
                        <span class="error-message">{{ $errors->first('clave') }}</span>
                      @endif

                </div>
                <div class="form-group row">
                    <label for="comentario">Comentario</label>
                    <textarea class="form-control {{ $errors->has('comentario') ? 'field-error' : '' }}" rows="3" name="comentario" placeholder="Comentario adicional">{{ old('comentario') }}</textarea>
                      @if ($errors->has('comentario'))
                          <span class="error-message">{{ $errors->first('comentario') }}</span>
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
