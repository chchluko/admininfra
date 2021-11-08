{!! Form::label('rack', 'Rack') !!}
{!! Form::text('rack', null, ['class'=>'form-control']) !!}
@error('rack')
<span class="error-message">{{ $message }}</span>
@enderror
