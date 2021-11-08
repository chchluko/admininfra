{!! Form::label('hostname', 'Hostname') !!}
{!! Form::text('hostname', null, ['class'=>'form-control']) !!}
@error('hostname')
<span class="error-message">{{ $message }}</span>
@enderror
