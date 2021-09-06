@extends('adminlte::page')

@section('title', 'Enlaces & Lineas')

@section('content_header')
<h1>Enlaces & Lineas</h1>
@stop
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Enlaces (Servicios) </h3>
        <div class="card-tools">
           <a type="link" href="enlaces/create" class="btn btn-tool"><i class="fas fa-plus"></i></a>

        </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @livewire('link.links-index')

          {{--  @include('partials.form.search',['target' => 'buscarlink','filtro'=> $filtros ]) --}}
            @include('partials.flash')
            @if ($resultado->count() > 20)
            <table class="table">
                <thead>
                    <th>Provedor</th>
                    <th>Tipo</th>
                    <th>Status</th>
                    <th>Referencia</th>
                    <th>Plazo</th>
                    <th>Ancho de banda</th>
                    <th>Costo Mensual</th>
                    <th>Fecha de contratación</th>
                    <th>Modificado</th>
                    <th>Accion</th>
                </thead>
                <tbody>
                        @foreach ($resultado as $servicio)
                                    <tr>
                                        <td>{{ $servicio->provedor->provedor }}</td>
                                        <td>{{ $servicio->status->status }}</td>
                                        <td>{{ $servicio->tipo->tipo }}</td>
                                        <td>{{ $servicio->referencia }}</td>
                                        <td>{{ $servicio->plazo }} meses</td>
                                        <td>{{ $servicio->anchodebanda }} MB</td>
                                        <td>$ {{--!! number_format($servicio->costo, 2, '.', ','); !!--}}</td>
                                        <td>{{ \Carbon\Carbon::parse($servicio->fcontratacion)->format('d/m/Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($servicio->updated_at)->format('d/m/Y') }}</td>
                                        <td class="py-0 text-right align-middle">
                                            <div class="btn-group btn-group-sm">
                                              <a href="{{ route('enlaces.edit',$servicio->id ) }}" class="btn btn-default"><i class="fas fa-edit"></i></a>
                                              <a href="{{ route('enlaces.show',$servicio->id ) }}" class="btn btn-default"><i class="fas fa-eye"></i></a>
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
    <script> console.log('Hi!'); </script>
@stop



