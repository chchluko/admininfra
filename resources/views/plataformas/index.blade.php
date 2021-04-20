@extends('adminlte::page')

@section('title', 'Hardware Plataformas')

@section('content_header')
<h1>Hardware Plataformas</h1>
@stop
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Hardware Plataformas</h3>
        <div class="card-tools">
            <a type="link" href="plataformas/create" class="btn btn-tool"><i class="fas fa-plus"></i></a>
        </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @include('partials.form.search',['target' => 'buscarplataforma','filtro'=>$filtros ])
            @include('partials.flash')
            @if ($resultado->count() > 0)
            <table class="table">
                <thead>
                    <th>Provedor</th>
                    <th>Tipo</th>
                    <th>Status</th>
                    <th>Marca</th>
                    <th>Ubicación</th>
                    <th>Modelo</th>
                    <th>Número de Serie</th>
                    <th>Vigencia (Garantia)</th>
                    <th>Modificado</th>
                    <th>Accion</th>
                </thead>
                <tbody>
            @foreach ($resultado as $hardware)
                        <tr>
                            <td>{{ $hardware->provedor->provedor }}</td>
                            <td>{{ $hardware->status->status }}</td>
                            <td>{{ $hardware->tipo->tipo }}</td>
                            <td>{{ $hardware->marca->marca }}</td>
                            <td width="200px">{{ $hardware->ubicacion->NOMBRE_AREA }} <br>
                                {{ $hardware->ubicacion->FullAddress }}
                            </td>
                            <td>{{ $hardware->modelo }}</td>
                            <td>{{ $hardware->noserie }}</td>
                            <td>{{ \Carbon\Carbon::parse($hardware->vigenciagarantia)->format('d/m/Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($hardware->updated_at)->format('d/m/Y') }}</td>
                            <td class="text-right py-0 align-middle">
                                <div class="btn-group btn-group-sm">
                                  <a href="{{ route('plataformas.edit',$hardware->id ) }}" class="btn btn-default"><i class="fas fa-edit"></i></a>
                                  <a href="{{ route('plataformas.show',$hardware->id ) }}" class="btn btn-default"><i class="fas fa-eye"></i></a>
                                </div>
                              </td>
                        </tr>

            @endforeach                </tbody>
            </table>
            @endif
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



