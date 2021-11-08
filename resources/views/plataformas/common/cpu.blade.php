{!! Form::label('cpu', 'CPU') !!}
{!! Form::text('cpu', null, ['class'=>'form-control']) !!}
@error('cpu')
<span class="error-message">{{ $message }}</span>
@enderror
