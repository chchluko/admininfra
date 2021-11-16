@extends('adminlte::page')

@section('title', 'Equipos Moviles')

@section('content_header')
<h1>Equipos Moviles</h1>
@stop
@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Edicion de Plan</h3>
        <div class="card-tools">
            <a type="link" href="/movilplan" class="btn btn-tool"><i class="fas fa-list"></i></a>
        </div>
    </div>
    <!-- /.card-header -->

    @include('partials.alert')
    <div class="card-body">
        {!! Form::model($movilplan, ['route'=>['movilplan.update',$movilplan],'method'=>'PUT']) !!}
        @csrf
        <div class="form-group row">
            {!! Form::Label('plantype_id', 'Nombre del Plan',['class' => 'col-sm-2 col-form-label']) !!}
            <div class="col-md-10">
                {!! Form::select('plantype_id', $plantypes, null, ['class' => 'form-control']) !!}
                @if ($errors->has('plantype_id'))
                <span class="error-message">{{ $errors->first('plantype_id') }}</span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <div class="col-6">
                {!! Form::label('lineatelefonica', 'Linea Telefonica') !!}
                {!! Form::text('lineatelefonica', null, ['class'=>'form-control','placeholder'=>'MB']) !!}
                @error('lineatelefonica')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-6">
                {!! Form::label('fechadeinicio', 'Fecha de Inicio') !!}
                {!! Form::date('fechadeinicio',null, ['class'=>'form-control']) !!}
                @error('fechadeinicio')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="col-6">
                {!! Form::label('plazo', 'Duración (meses)') !!}
                {!! Form::text('plazo', null, ['class'=>'form-control','placeholder'=>'MB']) !!}
                @error('plazo')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-6">
                {!! Form::label('fechadetermino', 'Fecha de Termino') !!}
                {!! Form::date('fechadetermino',null, ['class'=>'form-control']) !!}
                @error('fechadetermino')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="col-6">
                {!! Form::label('marcacioncorta', 'Marcacion Corta') !!}
                {!! Form::text('marcacioncorta', null, ['class'=>'form-control','placeholder'=>'Introduzca texto']) !!}
                @error('marcacioncorta')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-6">
                {!! Form::label('costo', 'Costo') !!}
                {!! Form::text('costo', null, ['class'=>'form-control','placeholder'=>'']) !!}
                @error('costo')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('serviciosadicionales', 'Servicios adicionales',['class'=>'col-sm-2 col-form-label']) !!}
            <div class="col-md-10">
            {!! Form::text('serviciosadicionales', null, ['class'=>'form-control','placeholder'=>'Introduzca texto'])
            !!}
            @error('serviciosadicionales')
            <span class="error-message">{{ $message }}</span>
            @enderror
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('cuentaasignada', 'Cuenta Asignada',['class'=>'col-sm-2 col-form-label']) !!}
            <div class="col-md-10">
            {!! Form::text('cuentaasignada', null, ['class'=>'form-control','placeholder'=>'Introduzca texto']) !!}
            @error('cuentaasignada')
            <span class="error-message">{{ $message }}</span>
            @enderror
            </div>
        </div>
        <div class="form-group row">
            @include('partials.form.comentario')
        </div>
    </div>
    <!-- /.card-body -->
    <div class="clearfix card-footer">
        <button type="submit" class="btn btn-info">Guardar</button>
        <a type="link" href="{{ url()->previous() }}" class="float-right btn btn-default">Cancelar</a>
    </div>
    {!! Form::close() !!}
</div>

@livewire('movil-plan.resources', ['movilplan' => $movilplan], key('resources'.$movilplan->id))

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!');
</script>
@stop
