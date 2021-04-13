{!! Form::Label('mark_id', 'Marca',['class' => '']) !!}
{!! Form::select('mark_id', $marcas, $id ?? 0, ['class' => 'form-control']) !!}
@if ($errors->has('mark_id'))
    <span class="error-message">{{ $errors->first('mark_id') }}</span>
@endif
