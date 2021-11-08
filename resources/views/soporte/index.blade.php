@extends('adminlte::page')

@section('title', 'Hardware Soporte')

@section('content_header')
<h1>Hardware Soporte</h1>
@stop
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Hardware</h3>
        <div class="card-tools">
            <a type="link" href="{{ route('soporte.create') }}" class="btn btn-tool"><i class="fas fa-plus"></i></a>
        </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @include('partials.form.search',['target' => 'buscarsupport','filtro'=>$filtros])
            @include('partials.flash')
            @if ($resultado->count() > 0)
            <table class="table">
                <thead>
                    <th>Provedor</th>
                    <th>Tipo</th>
                    <th>Status</th>
                    <th>Marca</th>
                    <th>Fecha de Compra</th>
                    <th>Modelo</th>
                    <th>Número de Serie</th>
                    <th>Vigencia (Garantia)</th>
                    <th>Inventario</th>
                    <th>Modificado</th>
                    <th>Accion</th>
                </thead>
                <tbody>
            @foreach ($resultado as $soporte)
                        <tr>
                            <td>{{ $soporte->provedor->provedor }}</td>
                            <td>{{ $soporte->status->status }}</td>
                            <td>{{ $soporte->tipo->tipo }}</td>
                            <td>{{ $soporte->marca->marca }}</td>
                            <td>{{ \Carbon\Carbon::parse($soporte->fechadecompra)->format('d/m/Y') }}                            </td>
                            <td>{{ $soporte->modelo }}</td>
                            <td>{{ $soporte->noserie }}</td>
                            <td>{{ \Carbon\Carbon::parse($soporte->vigenciagarantia)->format('d/m/Y') }}</td>
                           <td> {{ $soporte->inventario }} (AF)<br>
                                {{ $soporte->inventarioti }} (TI)</td>
                            <td>{{ \Carbon\Carbon::parse($soporte->updated_at)->format('d/m/Y') }}</td>
                            <td class="py-0 text-right align-middle">
                                <div class="btn-group btn-group-sm">
                                  <a href="{{ route('soporte.edit',$soporte->id ) }}" class="btn btn-default"><i class="fas fa-edit"></i></a>
                                  <a href="{{ route('soporte.show',$soporte->id ) }}" class="btn btn-default"><i class="fas fa-eye"></i></a>
                                </div>
                              </td>
                        </tr>

            @endforeach                </tbody>
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
    <script> console.log('Hi!'); </script>
@stop



