{!! Form::Label('owner_id', 'Owner',['class' => 'col-sm-2 col-form-label']) !!}
<div class="col-md-10">
    {!! Form::select('owner_id', $owners, $id ?? 0, ['class' => 'form-control']) !!}
    @if ($errors->has('owner_id'))
        <span class="error-message">{{ $errors->first('owner_id') }}</span>
    @endif
</div>
