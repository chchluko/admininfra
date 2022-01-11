@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Cuentas de Correo Electronico</h1>
@stop
@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Edicion de cuenta de correo</h3>
    </div>
    <!-- /.card-header -->

    <div class="card-body">
        @include('partials.alert')
        <div class="row">
            <div class="col-md-6 col-sm-3 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">{{ $email->email }}</span>
                <span class="info-box-number">{{ $email->nomina }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          </div>
          <form action="{{ route('emails.update',$email->id) }}" method="POST">
            @csrf
            @method('PUT')

                <input type="hidden" name="id" value="{{ $email->id }}">
                <input type="hidden" name="tipo" value="UpdatePassword">

                <div class="form-group row">
                    <label for="password" class="col-sm-2 col-form-label">Contraseña</label>
                    <div class="col-sm-10">
                      <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'field-error' : '' }}" id="password" placeholder="Nuevo password">
                      @if ($errors->has('password'))
                        <span class="error-message">{{ $errors->first('password') }}</span>
                      @endif
                    </div>

                  </div>
                  <div class="form-group row">
                    <label for="password_confirmation" class="col-sm-2 col-form-label">Confirmar Contraseña</label>
                    <div class="col-sm-10">
                      <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Escribalo de nuevo">
                    </div>
                  </div>
                  <div class="form-group">
                      <label>Motivo de la actualización </label>
                      <textarea class="form-control {{ $errors->has('motivo') ? 'field-error' : '' }}" rows="3" name="motivo" placeholder="Especifique el motivo por el cual necesita la contraseña ...">{{ old('motivo') }}</textarea>
                        @if ($errors->has('motivo'))
                            <span class="error-message">{{ $errors->first('motivo') }}</span>
                        @endif
                  </div>
    </div>
    <!-- /.card-body -->
    <div class="clearfix card-footer">
        <button type="submit" class="btn btn-info">Actualizar</button>
        <a type="link" href="{{ url()->previous() }}" class="float-right btn btn-default">Cancelar</a>

    </div>    </form>
  </div>

@can('view password vip')
      <div class="card card-cyan">
          <div class="card-header">Tipo de cuenta Asignada</div>
      <div class="card-body">
         @livewire('email.email-type', ['email' => $email], key('email-type'.$email->id))
      </div>
  </div>
@endcan

@stop

@section('css')
    <!--link rel="stylesheet" href="/css/admin_custom.css"-->
@stop

@section('js')
<script> window.addEventListener('swal',function(e){
    Swal.fire(e.detail);
}); </script>
@stop
