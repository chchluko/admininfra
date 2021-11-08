@extends('adminlte::page')

@section('title', 'Equipos Moviles')

@section('content_header')
<h1>Equipos Moviles</h1>
@stop
@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Almacen</h3>
        <div class="card-tools">
            <a type="link" href="{{ route('warehouse.create') }}" class="btn btn-tool"><i class="fas fa-plus"></i></a>
        </div>
    </div>
    <div class="card-body">
        @include('partials.flash')
        @if ($resultado->count() > 0)
        <table class="table">
            <thead>
                <th>Nombre</th>
                <th>Unidades</th>
                <th>Comentario</th>
                <th>Accion</th>
            </thead>
            <tbody>
                @foreach ($resultado as $warehouse)
                <tr>
                    <td>{{ $warehouse->name }}</td>
                    <td>{{ $warehouse->movil->count() }}</td>
                    <td>{{ $warehouse->comentario }}</td>
                    <td class="py-0 text-right align-middle">
                        <div class="btn-group btn-group-sm">
                            <a href="{{ route('warehouse.edit',$warehouse->id ) }}" class="btn btn-default"><i
                                    class="fas fa-edit"></i></a>
                            <a href="{{ route('warehouse.show',$warehouse->id ) }}" class="btn btn-default"><i
                                    class="fas fa-eye"></i></a>
                        </div>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
        @endif
    </div>
    <!-- /.card-body -->
    <div class="clearfix card-footer">
        @include('partials.paginacion')
    </div>
</div>
@stop

@section('css')
<!--link rel="stylesheet" href="/css/admin_custom.css"-->
@stop

@section('js')
<script>
    console.log('Hi!');
</script>
@stop
