    {!! Form::Label('status_id', 'Status',['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-md-10">
        {!! Form::select('status_id', $status, $id ?? 0, ['class' => 'form-control']) !!}
        @if ($errors->has('status_id'))
            <span class="error-message">{{ $errors->first('status_id') }}</span>
        @endif
    </div>

