{!! Form::label('referencia', 'Referencia') !!}
{!! Form::text('referencia', null, ['class'=>'form-control','placeholder'=>'Texto de referencia']) !!}
@error('referencia')
<span class="error-message">{{ $message }}</span>
@enderror

