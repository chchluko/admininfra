@extends('adminlte::page')

@section('title', 'Extensiones')

@section('content_header')
<h1>Extensiones</h1>
@stop
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tipos de Extensiones</h3>
            <div class="card-tools">
                <a type="link" href="extensionestipo/create" class="btn btn-tool"><i class="fas fa-plus"></i></a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @include('partials.flash')
            <table class="table">
                <thead>
                    <th>Tipo</th>
                    <th>Ultima modificacion</th>
                    <th>Accion</th>
                </thead>
                <tbody>
                    @foreach ($resultado as $tipos)
                                <tr>
                                    <td>{{ $tipos->tipo }}</td>
                                    <td>{{ \Carbon\Carbon::parse($tipos->updated_at)->format('d/m/Y H:i') }}</td>
                                    <td></td>
                                </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            @include('partials.paginacion')
        </div>
      </div>
@stop

@section('css')
    <!--link rel="stylesheet" href="/css/admin_custom.css"-->
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop



