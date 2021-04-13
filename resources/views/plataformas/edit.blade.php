@extends('adminlte::page')

@section('title', 'Hardware Plataformas')

@section('content_header')
<h1>Hardware Plataformas</h1>
@stop
@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Alta de Hardware</h3>
      <div class="card-tools">
        <a type="link" href="/plataformas" class="btn btn-tool"><i class="fas fa-list"></i></a>
    </div>
    </div>
    <!-- /.card-header -->


    <div class="card-body">@include('partials.alert')
          <form action="{{ route('plataformas.update',$plataforma->id) }}" method="POST">
            @csrf
            @method('PUT')
                <div class="form-group row">@include('partials.form.ubicacion',['idarea' => $plataforma->ubicacion_id])</div>
                <div class="form-group row">@include('partials.form.provider',['id' => $plataforma->provider_id])</div>
                <div class="form-group row">@include('partials.form.status',['id' => $plataforma->status_id])</div>
                <div class="form-group row">@include('partials.form.tipo',['id' => $plataforma->type_id])</div>
            <div class="form-group row">
                <div class="col-6">@include('partials.form.marca',['id' => $plataforma->mark_id])</div>
                <div class="col-6">@include('partials.form.garantia',['vigenciagarantia' => $plataforma->vigenciagarantia])</div>
            </div>
                <div class="form-group row">
                    <div class="col-6">@include('partials.form.modelo',['modelo' => $plataforma->modelo])</div>
                    <div class="col-6">@include('partials.form.serie',['noserie' => $plataforma->noserie])</div>
                </div>
            <div class="form-group row">@include('partials.form.comentario',['comentario' => $plataforma->comentario])</div>
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
