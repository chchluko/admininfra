{!! Form::label('comentario', 'Comentario') !!}
{!! Form::textarea('comentario', null, ['class'=>'form-control','placeholder'=>'Opcional']) !!}
@error('comentario')
<span class="error-message">{{ $message }}</span>
@enderror
