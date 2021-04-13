@extends('adminlte::page')

@section('title', 'Enlaces & Lineas')

@section('content_header')
<h1>Enlaces & Lineas</h1>
@stop
@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Edición de Enlace</h3>
      <div class="card-tools">
        <a type="link" href="/enlaces" class="btn btn-tool"><i class="fas fa-list"></i></a>
    </div>
    </div>
    <!-- /.card-header -->

@include('partials.alert')
    <div class="card-body">
          <form action="{{ route('enlaces.update',$enlace->id) }}" method="POST">
            @csrf
            @method('PUT')
                    @include('partials.form.ubicacion',['idarea' => $enlace->ubicacion_id])
                    @include('partials.form.provider',['id' => $enlace->provider_id])
                    @include('partials.form.status',['id' => $enlace->status_id])
                    @include('partials.form.tipo',['id' => $enlace->type_id])
                <div class="form-group row">
                    <div class="col-6">
                    <label for="referencia">Referencia</label>
                      <input type="text" name="referencia" class="form-control {{ $errors->has('referencia') ? 'field-error' : '' }}"
                      id="referencia" placeholder="Texto de referencia" value="{{ $enlace->referencia ?: old('referencia') }}">
                      @if ($errors->has('referencia'))
                        <span class="error-message">{{ $errors->first('referencia') }}</span>
                      @endif
                    </div>
                    <div class="col-6">
                        <label for="anchodebanda">Ancho de Banda (MB)</label>
                        <input type="text" name="anchodebanda" class="form-control {{ $errors->has('anchodebanda') ? 'field-error' : '' }}" id="anchodebanda" placeholder="MB" value="{{ $enlace->anchodebanda ?: old('anchodebanda') }}">
                        @if ($errors->has('anchodebanda'))
                          <span class="error-message">{{ $errors->first('anchodebanda') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-4">
                                           <label for="plazo">Plazo (meses)</label>
                      <input type="number" name="plazo" class="form-control {{ $errors->has('plazo') ? 'field-error' : '' }}" id="plazo" placeholder="Meses" value="{{ $enlace->plazo ?: old('plazo') }}">
                      @if ($errors->has('plazo'))
                        <span class="error-message">{{ $errors->first('plazo') }}</span>
                      @endif
                    </div>
                    <div class="col-4">
                    <label for="fcontratacion">Fecha de contratación</label>
                      <input type="date" name="fcontratacion" class="form-control {{ $errors->has('fcontratacion') ? 'field-error' : '' }}" id="fcontratacion" value="{{ \Carbon\Carbon::parse($enlace->fcontratacion)->format('Y-m-d') ?: old('fcontratacion') }}">
                      @if ($errors->has('fcontratacion'))
                        <span class="error-message">{{ $errors->first('fcontratacion') }}</span>
                      @endif
                    </div>
                    <div class="col-4">
                        <label for="costo">Costo Mensual</label>
                        <input type="text" name="costo" class="form-control {{ $errors->has('costo') ? 'field-error' : '' }}" id="costo" placeholder="Costo Mensual" value="{{ $enlace->costo ?: old('costo') }}">
                        @if ($errors->has('costo'))
                          <span class="error-message">{{ $errors->first('costo') }}</span>
                        @endif
                    </div>
                </div>
@include('partials.form.comentario',['comentario' => $enlace->comentario])
    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">
        <button type="submit" class="btn btn-info">Actualizar</button>
        <a type="link" href="{{ url()->previous() }}" class="btn btn-default float-right">Cancelar</a>
    </div>
</form>
  </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>     $(document).ready(function() {
        $('.datos').select2();
    }); </script>
@stop
