@extends('adminlte::page')

@section('title', 'Hardware Soporte')

@section('content_header')
<h1>Hardware Soporte</h1>
@stop
@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Alta de Hardware</h3>
      <div class="card-tools">
        <a type="link" href="/soporte" class="btn btn-tool"><i class="fas fa-list"></i></a>
    </div>
    </div>
    <!-- /.card-header -->


    <div class="card-body">@include('partials.alert')
        <form action="{{ route('soporte.update',$soporte->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group row">
                @include('partials.form.provider',['id' => $soporte->provider_id])
            </div>
            <div class="form-group row">
                @include('partials.form.status',['id' => $soporte->status_id])
            </div>
            <div class="form-group row">
                @include('partials.form.tipo',['id' => $soporte->type_id])
            </div>
            <div class="form-group row">
                @include('soporte.common.owner')d
            </div>
                    <div class="form-group row">
                        <div class="col-6">
                            @include('soporte.common.inventario')
                        </div>
                        <div class="col-6">
                            @include('soporte.common.fechacompra')
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-6">
                            @include('partials.form.marca',['id' => $soporte->mark_id])
                        </div>
                        <div class="col-6">@include('partials.form.garantia',['vigenciagarantia' => $plataforma->vigenciagarantia])</div>
                    </div>
                    <div class="form-group row">
                        <div class="col-6">@include('partials.form.modelo',['modelo' => $soporte->modelo])</div>
                        <div class="col-6">@include('partials.form.serie',['noserie' => $soporte->noserie])</div>
                    </div>
                    <div class="form-group row">
                        @include('soporte.common.inventarioti')
                    </div>
                    <div class="form-group row">
                        @include('partials.form.comentario',['comentario' => $soporte->comentario])
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
