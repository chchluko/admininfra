    {!! Form::Label('ubicacion_id', 'Ubicación',['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-md-10">
        {!! Form::select('ubicacion_id', $ubicaciones, $idarea ?? 0, ['class' => 'form-control datos']) !!}
        @if ($errors->has('ubicacion_id'))
            <span class="error-message">{{ $errors->first('ubicacion_id') }}</span>
        @endif
    </div>
