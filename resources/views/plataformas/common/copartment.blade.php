{!! Form::label('copartment', 'Copartment') !!}
{!! Form::text('copartment', null, ['class'=>'form-control']) !!}
@error('copartment')
<span class="error-message">{{ $message }}</span>
@enderror
