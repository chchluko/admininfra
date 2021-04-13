@extends('adminlte::page')

@section('content')

<!-- Main content -->
    <section class="content">
      <div class="error-page">
        <h2 class="headline text-danger">419</h2>

        <div class="error-content">
          <h3><i class="fas fa-exclamation-triangle text-danger"></i> Oops! La sesion Expiro.</h3>

          <p>
            <a href="/login">Iniciar sesion</a>
          </p>

        </div>
      </div>
      <!-- /.error-page -->

    </section>

    @stop

    @section('css')
        <!--link rel="stylesheet" href="/css/admin_custom.css"-->
    @stop

    @section('js')
        <script> console.log('Hi!'); </script>
    @stop
