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
        <a type="link" href="/enlaces" class="btn btn-tool"><i class="fas fa-list"></i></a>
    </div>
    </div>
    <!-- /.card-header -->


    <div class="card-body">@include('partials.alert')
          <form action="{{ route('plataformas.store') }}" method="POST">
            @csrf
            <div class="form-group row">@include('partials.form.ubicacion')</div>
            <div class="form-group row">@include('partials.form.provider')</div>
            <div class="form-group row">@include('partials.form.tipo')</div>
            <div class="form-group row">@include('partials.form.status')</div>
            <div class="form-group row">
                <div class="col-6">
                    @include('partials.form.marca')
                </div>
                <div class="col-6">
                    @include('partials.form.garantia')
                </div>
            </div>
                <div class="form-group row">
                    <div class="col-6">
                        @include('partials.form.modelo')
                    </div>
                    <div class="col-6">
                        @include('partials.form.serie')
                    </div>
                </div>
                <div class="form-group row">@include('partials.form.comentario')</div>
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
    <script>     $(document).ready(function() {
        $('.datos').select2();
    }); </script>
@stop
