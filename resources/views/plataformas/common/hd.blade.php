{!! Form::label('hd', 'HD') !!}
{!! Form::text('hd', null, ['class'=>'form-control']) !!}
@error('hd')
<span class="error-message">{{ $message }}</span>
@enderror
