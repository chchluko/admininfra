@extends('adminlte::page')

@section('title', 'Equipos Moviles')

@section('content_header')
<h1>Equipos Moviles</h1>
@stop
@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Liberación de Equipo Movil</h3>
        <div class="card-tools">
            <a type="link" href="{{ route('movil.index') }}" class="btn btn-tool"><i class="fas fa-list"></i></a>
        </div>
    </div>
    <!-- /.card-header -->
    @include('partials.alert')
    <div class="card-body">
        {!! Form::open( ['route'=>['asignacionmovil.destroy',$asignacionmovil],'method'=>'DELETE']) !!}
        <div class="form-group row">
            {!! Form::Label('warehouse_id', 'Almacen',['class' => 'col-sm-2 col-form-label']) !!}
            <div class="col-md-10">
                {!! Form::select('warehouse_id', $warehouses, null, ['class' => 'form-control']) !!}
                @if ($errors->has('warehouse_id'))
                <span class="error-message">{{ $errors->first('warehouse_id') }}</span>
                @endif
            </div>
        </div>
    </div>
    <!-- /.card-body -->
    <div class="clearfix card-footer">
        <button type="submit" class="float-right btn btn-warning">Liberar</button>
        <a type="link" href="{{ url()->previous() }}" class="float-right btn btn-default">Cancelar</a>
    </div>
    {!! Form::close() !!}
</div>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script></script>
@stop
