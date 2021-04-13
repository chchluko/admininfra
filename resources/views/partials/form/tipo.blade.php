    {!! Form::Label('type_id', 'Tipo',['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-md-10">
        {!! Form::select('type_id', $tipos, $id ?? 0, ['class' => 'form-control']) !!}
        @if ($errors->has('type_id'))
            <span class="error-message">{{ $errors->first('type_id') }}</span>
        @endif
    </div>
