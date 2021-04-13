@extends('adminlte::page')

@section('title', 'Hardware Soporte')

@section('content_header')
<h1>Hardware Soporte</h1>
@stop
@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Alta de Owner</h3>
      <div class="card-tools">
        <a type="link" href="/soporteowner" class="btn btn-tool"><i class="fas fa-list"></i></a>
    </div>
    </div>
    <!-- /.card-header -->


    <div class="card-body">@include('partials.alert')
          <form action="{{ route('soporteowner.store') }}" method="POST">
            @csrf
                <div class="form-group row">
                    <label for="owner">Owner</label>
                      <input type="text" name="owner" class="form-control {{ $errors->has('owner') ? 'field-error' : '' }}" id="owner" placeholder="Nombre del owner" value="{{ old('owner') }}">
                      @if ($errors->has('owner'))
                        <span class="error-message">{{ $errors->first('owner') }}</span>
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
