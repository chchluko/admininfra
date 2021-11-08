{!! Form::label('user', 'Usuario') !!}
{!! Form::text('user', null, ['class'=>'form-control']) !!}
@error('user')
<span class="error-message">{{ $message }}</span>
@enderror
