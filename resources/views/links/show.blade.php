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
        <div class="order-2 col-12 col-md-12 col-lg-8 order-md-1">
          <div class="row">
            <div class="col-12 col-sm-4">
              <div class="info-box bg-light">
                <div class="info-box-content">
                  <span class="text-center info-box-text text-muted">Referencia</span>
                  <span class="mb-0 text-center info-box-number text-muted">{{ $enlace->referencia }}</span>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-4">
              <div class="info-box bg-light">
                <div class="info-box-content">
                  <span class="text-center info-box-text text-muted">Ancho de Banda (MB)</span>
                  <span class="mb-0 text-center info-box-number text-muted">{{ $enlace->anchodebanda }}</span>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-4">
              <div class="info-box bg-light">
                <div class="info-box-content">
                  <span class="text-center info-box-text text-muted">Proveedor</span>
                  <span class="mb-0 text-center info-box-number text-muted">{{ $enlace->provedor->provedor }}</span>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12 col-sm-4">
              <div class="info-box bg-light">
                <div class="info-box-content">
                  <span class="text-center info-box-text text-muted">IP Managment</span>
                  <span class="mb-0 text-center info-box-number text-muted">{{ $enlace->ipmanagment }}</span>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-4">
              <div class="info-box bg-light">
                <div class="info-box-content">
                  <span class="text-center info-box-text text-muted">IP MPLS</span>
                  <span class="mb-0 text-center info-box-number text-muted">{{ $enlace->ipmpls }}</span>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-4">
              <div class="info-box bg-light">
                <div class="info-box-content">
                  <span class="text-center info-box-text text-muted">IP Fija</span>
                  <span class="mb-0 text-center info-box-number text-muted">{{ $enlace->ipfija }}</span>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12 col-sm-4">
              <div class="info-box bg-light">
                <div class="info-box-content">
                  <span class="text-center info-box-text text-muted">Segmento</span>
                  <span class="mb-0 text-center info-box-number text-muted">{{ $enlace->segmento }}</span>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-4">
              <div class="info-box bg-light">
                <div class="info-box-content">
                  <span class="text-center info-box-text text-muted">Tamaño MPLS</span>
                  <span class="mb-0 text-center info-box-number text-muted">{{ $enlace->tamanompls }}</span>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-4">
              <div class="info-box bg-light">
                <div class="info-box-content">
                  <span class="text-center info-box-text text-muted">Tipo</span>
                  <span class="mb-0 text-center info-box-number text-muted">{{ $enlace->tipo->tipo }}</span>
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
        <div class="order-1 col-12 col-md-12 col-lg-4 order-md-2">
          <h3 class="text-primary"><i class="fas fa-map-marker-alt"></i> Ubicación</h3>
          <p class="text-muted">{{ $enlace->ubicacion->NOMBRE_AREA }} <br>
            {{ $enlace->ubicacion->FullAddress }}</p>
          <br>
          <div class="text-muted">
            <p class="text-sm">Status
                <b class="d-block">{{ $enlace->status->status }}</b>
              </p>
              <p class="text-sm">Costo Mensual
                <b class="d-block">$ {{-- !!number_format($enlace->costo,2,'.',',');!! --}}</b>
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

          <div class="mt-5 mb-3 text-center">
            <a type="link" href="{{ url()->previous() }}" class="float-right btn btn-default">Regresar</a>
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
