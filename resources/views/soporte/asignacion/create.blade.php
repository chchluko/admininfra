@extends('adminlte::page')

@section('title', 'Hardware Soporte')

@section('content_header')
<h1>Hardware Soporte</h1>
@stop
@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Asignación de Hardware</h3>
      <div class="card-tools">
        <a type="link" href="/asignacionclaves" class="btn btn-tool"><i class="fas fa-list"></i></a>
      </div>
    </div>
    <!-- /.card-header -->


    <div class="card-body">@include('partials.alert')
          <form action="{{ route('asignacionsoporte.store') }}" method="POST">
            @csrf
            <div class="form-group row">@include('partials.form.empleado')</div>
            <div class="form-group row">@include('partials.form.ubicacion')</div>
                <div class="form-group row">
                    {!! Form::Label('support_id', 'Hardware',['class' => 'col-sm-2 col-form-label']) !!}
                    <div class="col-md-10">
                        {!! Form::select('support_id', $hardware, 0, ['class' => 'form-control datos']) !!}
                        @if ($errors->has('support_id'))
                            <span class="error-message">{{ $errors->first('support_id') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="condiciones">Condiciones de Entrega</label>
                    <textarea class="form-control {{ $errors->has('condiciones') ? 'field-error' : '' }}" rows="3"
                        name="condiciones" placeholder="Opcional">{{ old('condiciones') }}</textarea>
                    @if ($errors->has('condiciones'))
                        <span class="error-message">{{ $errors->first('condiciones') }}</span>
                    @endif
                </div>
                <div class="form-group row">@include('partials.form.comentario')</div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">
        <button type="submit" class="btn btn-info">Guardar</button>
        <a type="link" href="{{ url()->previous() }}" class="btn btn-default float-right">Cancelar</a>
    </div>
</form>
  </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
    $(document).ready(function() {
        $('.datos').select2();
    });
    </script>
@stop
