{!! Form::label('password', 'Password') !!}
{!! Form::text('password', null, ['class'=>'form-control']) !!}
@error('password')
<span class="error-message">{{ $message }}</span>
@enderror
