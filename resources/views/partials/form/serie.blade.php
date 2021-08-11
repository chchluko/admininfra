
{!! Form::label('noserie', 'Número de Serie') !!}
{!! Form::text('noserie', null, ['class'=>'form-control','placeholder'=>'######']) !!}
@error('noserie')
<span class="error-message">{{ $message }}</span>
@enderror
