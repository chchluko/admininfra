{!! Form::label('ram', 'RAM') !!}
{!! Form::text('ram', null, ['class'=>'form-control']) !!}
@error('ram')
<span class="error-message">{{ $message }}</span>
@enderror
