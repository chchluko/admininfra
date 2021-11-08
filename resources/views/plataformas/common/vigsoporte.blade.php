{!! Form::label('vigsoporte', 'Vigencia de Soporte') !!}
{!! Form::date('vigsoporte',null, ['class'=>'form-control']) !!}
@error('vigsoporte')
<span class="error-message">{{ $message }}</span>
@enderror
