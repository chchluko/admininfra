@extends('adminlte::page')

@section('title', 'Enlaces & Lineas')

@section('content_header')
<h1>Enlaces & Lineas</h1>
@stop

@section('content')



<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Detalles de Enlace</h3>

      <div class="card-tools">
Modificado: {{ \Carbon\Carbon::parse($enlace->updated_at)->format('d/m/Y') }}
      </div>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
          <div class="row">
            <div class="col-12 col-sm-4">
              <div class="info-box bg-light">
                <div class="info-box-content">
                  <span class="info-box-text text-center text-muted">Referencia</span>
                  <span class="info-box-number text-center text-muted mb-0">{{ $enlace->referencia }}</span>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-4">
              <div class="info-box bg-light">
                <div class="info-box-content">
                  <span class="info-box-text text-center text-muted">Ancho de Banda</span>
                  <span class="info-box-number text-center text-muted mb-0">{{ $enlace->anchodebanda }} MB</span>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-4">
              <div class="info-box bg-light">
                <div class="info-box-content">
                  <span class="info-box-text text-center text-muted">Provedor</span>
                  <span class="info-box-number text-center text-muted mb-0">{{ $enlace->provedor->provedor }}</span>
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
                    {{ $enlace->comentario }}
                  </p>

                </div>

            </div>
          </div>
        </div>
        <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
          <h3 class="text-primary"><i class="fas fa-map-marker-alt"></i> Ubicación</h3>
          <p class="text-muted">{{ $enlace->ubicacion->NOMBRE_AREA }} <br>
            {{ $enlace->ubicacion->FullAddress }}</p>
          <br>
          <div class="text-muted">
            <p class="text-sm">Tipo
              <b class="d-block">{{ $enlace->tipo->tipo }}</b>
            </p>
            <p class="text-sm">Status
                <b class="d-block">{{ $enlace->status->status }}</b>
              </p>
              <p class="text-sm">Costo Mensual
                <b class="d-block">$ {!! number_format($enlace->costo, 2, '.', ','); !!}</b>
              </p>
              <p class="text-sm">Fecha de contratación
                <b class="d-block">{{ \Carbon\Carbon::parse($enlace->fcontratacion)->format('d/m/Y') }}</b>
              </p>
              <p class="text-sm">Plazo
                <b class="d-block">{{ $enlace->plazo }} Meses</b>
              </p>
              <p class="text-sm">Fin de contratación
                <b class="d-block">{{ \Carbon\Carbon::parse($enlace->fcontratacion)->addMonths($enlace->plazo)->format('d/m/Y') }}</b>
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
