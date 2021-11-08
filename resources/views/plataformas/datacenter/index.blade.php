@extends('adminlte::page')

@section('title', 'Hardware Plataformas')

@section('content_header')
<h1>Hardware Plataformas</h1>
@stop
@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Centro de Datos</h3>
        <div class="card-tools">
            <a type="link" href="{{ route('datacenters.create') }}" class="btn btn-tool"><i class="fas fa-plus"></i></a>
        </div>
    </div>
    <div class="card-body">
        @include('partials.flash')
        @if ($resultado->count() > 0)
        <table class="table">
            <thead>
                <th>Nombre</th>
                <th>Direccion</th>
                <th>Accion</th>
            </thead>
            <tbody>
                @foreach ($resultado as $datacenter)
                <tr>
                    <td>{{ $datacenter->name }}</td>
                    <td>{{ $datacenter->direccion }}</td>
                    <td class="py-0 text-right align-middle">
                        <div class="btn-group btn-group-sm">
                            <a href="{{ route('datacenters.edit',$datacenter->id ) }}" class="btn btn-default"><i
                                    class="fas fa-edit"></i></a>
                            <a href="{{ route('datacenters.show',$datacenter->id ) }}" class="btn btn-default"><i
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
