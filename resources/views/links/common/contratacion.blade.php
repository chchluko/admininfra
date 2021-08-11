{!! Form::label('fcontratacion', 'Fecha de contratación') !!}
{!! Form::date('fcontratacion',null, ['class'=>'form-control']) !!}
@error('fcontratacion')
<span class="error-message">{{ $message }}</span>
@enderror
