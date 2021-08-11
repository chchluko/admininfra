    {!! Form::label('type_id', 'Tipo',['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-md-10">
    {!! Form::select('type_id', $tipos, null, ['class'=>'form-control'])
    !!}
            @if ($errors->has('type_id'))
            <span class="error-message">{{ $errors->first('type_id') }}</span>
        @endif
    </div>
