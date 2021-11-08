{!! Form::label('rol', 'Rol') !!}
{!! Form::text('rol', null, ['class'=>'form-control']) !!}
@error('rol')
<span class="error-message">{{ $message }}</span>
@enderror
