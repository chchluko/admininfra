{!! Form::label('anchodebanda', 'Ancho de Banda (MB)') !!}
{!! Form::text('anchodebanda', null, ['class'=>'form-control','placeholder'=>'MB']) !!}
@error('anchodebanda')
<span class="error-message">{{ $message }}</span>
@enderror
