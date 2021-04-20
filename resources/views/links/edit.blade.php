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


    <div class="card-body">@include('partials.alert')
          <form action="{{ route('enlaces.update',$enlace->id) }}" method="POST">
            @csrf
            @method('PUT')
                    <div class="form-group row">@include('partials.form.ubicacion',['idarea' => $enlace->ubicacion_id])</div>
                    <div class="form-group row">@include('partials.form.provider',['id' => $enlace->provider_id])</div>
                    <div class="form-group row">@include('partials.form.status',['id' => $enlace->status_id])</div>
                    <div class="form-group row">@include('partials.form.tipo',['id' => $enlace->type_id])</div>
                <div class="form-group row">
                    <div class="col-6">
                        @include('links.common.referencia')
                    </div>
                    <div class="col-6">
                        @include('links.common.brandwidth')
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-4">
                        @include('links.common.plazo')
                    </div>
                    <div class="col-4">
                        @include('links.common.costo')
                    </div>
                    <div class="col-4">
                        @include('links.common.contratacion')
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
