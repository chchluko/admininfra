{!! Form::label('modelo', 'Modelo') !!}
{!! Form::text('modelo', null, ['class'=>'form-control','placeholder'=>'######']) !!}
@error('modelo')
<span class="error-message">{{ $message }}</span>
@enderror
