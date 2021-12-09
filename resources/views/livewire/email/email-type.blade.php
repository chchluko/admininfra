    <div class="form-group row">
        {!! Form::Label('tipo', 'Tipo',['class' => 'col-sm-2 col-form-label']) !!}
        <div class="col-md-10">
            {!! Form::select('tipo', $tipo, $this->type_id,
            ['class' => 'form-control','wire:click' => 'changeEvent($event.target.value)']) !!}
            @if ($errors->has('tipo'))
                <span class="error-message">{{ $errors->first('tipo') }}</span>
            @endif
        </div>
    </div>

