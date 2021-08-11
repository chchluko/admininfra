{!! Form::label('plazo', 'Plazo (meses)') !!}
{!! Form::text('plazo', null, ['class'=>'form-control','placeholder'=>'Meses']) !!}
@error('plazo')
<span class="error-message">{{ $message }}</span>
@enderror
