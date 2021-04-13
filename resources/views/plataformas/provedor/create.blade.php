@extends('adminlte::page')

@section('title', 'Hardware Plataformas')

@section('content_header')
<h1>Hardware Plataformas</h1>
@stop
@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Alta de Provedor</h3>
      <div class="card-tools">
        <a type="link" href="/plataformasprovedor" class="btn btn-tool"><i class="fas fa-list"></i></a>
    </div>
    </div>
    <!-- /.card-header -->


    <div class="card-body">@include('partials.alert')
          <form action="{{ route('plataformasprovedor.store') }}" method="POST">
            @csrf
                <div class="form-group row">
                    <label for="provedor">Provedor</label>
                      <input type="text" name="provedor" class="form-control {{ $errors->has('provedor') ? 'field-error' : '' }}" id="provedor" placeholder="Nombre del provedor" value="{{ old('provedor') }}">
                      @if ($errors->has('provedor'))
                        <span class="error-message">{{ $errors->first('provedor') }}</span>
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
