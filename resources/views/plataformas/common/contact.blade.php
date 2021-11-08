{!! Form::label('contact', 'Contacto') !!}
{!! Form::text('contact', null, ['class'=>'form-control']) !!}
@error('contact')
<span class="error-message">{{ $message }}</span>
@enderror
