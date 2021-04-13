@extends('adminlte::page')

@section('title', 'Hardware Plataformas')

@section('content_header')
<h1>Hardware Plataformas</h1>
@stop

@section('content')

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Detalles de Hardware</h3>

      <div class="card-tools">Modificado: {{ \Carbon\Carbon::parse($plataforma->updated_at)->format('d/m/Y') }}
      </div>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
          <div class="row">
            <div class="col-12 col-sm-4">
                <div class="info-box bg-light">
                  <div class="info-box-content">
                    <span class="info-box-text text-center text-muted">Tipo</span>
                    <span class="info-box-number text-center text-muted mb-0">{{ $plataforma->tipo->tipo }}</span>
                  </div>
                </div>
              </div>
            <div class="col-12 col-sm-4">
              <div class="info-box bg-light">
                <div class="info-box-content">
                  <span class="info-box-text text-center text-muted">Modelo</span>
                  <span class="info-box-number text-center text-muted mb-0">{{ $plataforma->modelo }}</span>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-4">
              <div class="info-box bg-light">
                <div class="info-box-content">
                  <span class="info-box-text text-center text-muted">Marca</span>
                  <span class="info-box-number text-center text-muted mb-0">{{ $plataforma->marca->marca }}</span>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <h4>Comentario</h4>
                <div class="post">
                  <!-- /.user-block -->
                  <p>
                    {{ $plataforma->comentario }}
                  </p>

                </div>

            </div>
          </div>
        </div>
        <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
          <h3 class="text-primary"><i class="fas fa-map-marker-alt"></i> Ubicación</h3>
          <p class="text-muted">{{ $plataforma->ubicacion->NOMBRE_AREA }} <br>
            {{ $plataforma->ubicacion->FullAddress }}</p>
          <br>
          <div class="text-muted">
            <p class="text-sm">Número de Serie
              <b class="d-block">{{ $plataforma->noserie }}</b>
            </p>
            <p class="text-sm">Status
                <b class="d-block">{{ $plataforma->status->status }}</b>
              </p>
              <p class="text-sm">Provedor
                <b class="d-block">{{ $plataforma->provedor->provedor }}</b>
              </p>
              <p class="text-sm">Vigencia de Garantia
                <b class="d-block">{{ \Carbon\Carbon::parse($plataforma->vigenciagarantia)->format('d/m/Y') }}</b>
              </p>
          </div>

          <div class="text-center mt-5 mb-3">
            <a type="link" href="{{ url()->previous() }}" class="btn btn-default float-right">Regresar</a>
          </div>
        </div>
      </div>
    </div>
    <!-- /.card-body -->
  </div>

  @stop

@section('css')
    <!--link rel="stylesheet" href="/css/admin_custom.css"-->
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
