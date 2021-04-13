@extends('adminlte::page')

@section('title', 'Claves telefonicas')

@section('content_header')
<h1>Claves telefonicas</h1>
@stop
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Todas las Claves</h3>
                <div class="card-tools">
                    <a type="link" href="clavestelefonicas/create" class="btn btn-tool"><i class="fas fa-plus"></i></a>
                </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @include('partials.flash')            <table class="table">
                <thead>
                    <th>Clave</th>
                    <th>Comentario</th>
                    <th>Status</th>
                    <th>Ultima modificacion</th>
                    <th>Accion</th>
                </thead>
                <tbody>
            @foreach ($resultado as $claves)
                        <tr>
                            <td>{{ $claves->clave }}</td>
                            <td>{{ $claves->comentario }}</td>
                            <td>@if ($claves->activo == 1)
                                    <span class="badge badge-success"> Activa </span>
                                @else
                                    <span class="badge badge-info"> Inactiva </span>
                                @endif
                                @if ($claves->asignado == 1)
                                    <span class="badge badge-success"> Asignada </span>
                                @else
                                    <span class="badge badge-info"> Libre </span>
                                @endif
                            <td>{{ \Carbon\Carbon::parse($claves->updated_at)->format('d/m/Y H:i') }}</td>
                            </td>
                            <td>

                            </td>
                        </tr>

            @endforeach                </tbody>
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



