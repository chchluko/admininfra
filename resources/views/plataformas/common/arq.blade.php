{!! Form::Label('arq_id', 'Arquitectura',['class' => '']) !!}
{!! Form::select('arq_id', $arq, null, ['class' => 'form-control']) !!}
@if ($errors->has('arq_id'))
    <span class="error-message">{{ $errors->first('mark_id') }}</span>
@endif
