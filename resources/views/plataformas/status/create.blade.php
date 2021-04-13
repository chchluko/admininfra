@extends('adminlte::page')

@section('title', 'Hardware Plataformas')

@section('content_header')
<h1>Hardware Plataformas</h1>
@stop
@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Alta de Status</h3>
      <div class="card-tools">
        <a type="link" href="/plataformasstatus" class="btn btn-tool"><i class="fas fa-list"></i></a>
      </div>
    </div>
    <!-- /.card-header -->


    <div class="card-body">@include('partials.alert')
          <form action="{{ route('plataformasstatus.store') }}" method="POST">
            @csrf
                <div class="form-group row">
                    <label for="status">Status</label>
                      <input type="text" name="status" class="form-control {{ $errors->has('status') ? 'field-error' : '' }}" id="status" placeholder="Introduzca texto aqui" value="{{ old('status') }}">
                      @if ($errors->has('status'))
                        <span class="error-message">{{ $errors->first('status') }}</span>
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
