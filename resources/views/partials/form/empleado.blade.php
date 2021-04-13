    {!! Form::Label('nomina', 'Usuario',['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-md-10">
        {!! Form::select('nomina', $empleados, 0, ['class' => 'form-control datos']) !!}
        @if ($errors->has('nomina'))
            <span class="error-message">{{ $errors->first('nomina') }}</span>
        @endif
    </div>
