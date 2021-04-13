@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Colaboradores PROA</h1>
@stop
@section('content')
    <div class="card">
        <div class="card-header">
            <form class="form" action="{{ route('buscarempleado') }}" method="GET">

                <div class="form-group">
                {!! Form::select('tipo', ['0'=>'Seleccione un tipo','NOMINA'=>'Nomina','NOMBRE'=>'Nombre','APELLIDOPATERNO'=>'Apellido Paterno','APELLIDOMATERNO'=>'Apellido Materno'], 0, ['class' => 'form-control']) !!}

                @error('tipo')
                    <span class="help-block">{{ $message }}</span>
                @enderror
            </div>
                <div class="form-group">
                    <div class="input-group">
                        <input type="search" class="form-control form-control-lg {{ $errors->has('nombre') ? 'field-error' : '' }}"
                        placeholder="Introduzca el texto" name="nombre" value="{{ old('nombre') }}">



                        <div class="input-group-append">
                            <button type="submit" class="btn btn-lg btn-default">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>@error('nombre')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>
            </form>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @include('partials.flash')
            <table class="table">
                <thead>
                    <th>Nomina</th>
                    <th>Nombre</th>
                    <th>Status</th>
                    <th>Departamento</th>
                    <th>Area</th>
                    <th>Puesto</th>
                </thead>
            <tbody>
            @foreach ($resultado as $colaborador)
                        <tr>
                            <td>{{ $colaborador->NOMINA }}</td>
                            <td>{{ $colaborador->FullName }}</td>
                            <td>@if ($colaborador->STATUS == 3)
                                    <span class="badge badge-success"> Activo </span>
                                @else
                                    <span class="badge badge-danger"> Baja </span>
                                @endif</td>
                            <td>{{ $colaborador->NOMBRE_DEPARTAMENTO }}</td>
                            <td>{{ $colaborador->NOMBRE_AREA }}</td>
                            <td>{{ $colaborador->NOMBRE_PUESTO }}<br>@if ($colaborador->APELLIDO_PUESTO != 'N/A')
                           {{ $colaborador->APELLIDO_PUESTO }}
                        @endif</td>
                        </tr>
            @endforeach
            </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            {!! $resultado->appends(Request::all())->links() !!}
        </div>
      </div>
@stop

@section('css')
    <!--link rel="stylesheet" href="/css/admin_custom.css"-->
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop



