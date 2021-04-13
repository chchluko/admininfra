@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Ubicaciones PROA</h1>
@stop
@section('content')
    <div class="card">
        <div class="card-header">
            <form class="form" action="{{ route('buscarempleado') }}" method="GET">
                <div class="form-group row">
                    {!! Form::Label('ubicacion', 'Ubicación',['class' => 'col-sm-2 col-form-label']) !!}
                    <div class="col-md-10">
                        {!! Form::select('ubicacion', $ubicaciones, 0, ['class' => 'form-control select2']) !!}
                        @if ($errors->has('ubicacion'))
                            <span class="error-message">{{ $errors->first('ubicacion') }}</span>
                        @endif
                    </div>
                </div>
            </form>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @include('partials.flash')

        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">

        </div>
      </div>
@stop

@section('css')
    <!--link rel="stylesheet" href="/css/admin_custom.css"-->
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop



