{!! Form::label('ip', 'IP') !!}
{!! Form::text('ip', null, ['class'=>'form-control']) !!}
@error('ip')
<span class="error-message">{{ $message }}</span>
@enderror
