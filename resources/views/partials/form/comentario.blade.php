{!! Form::label('comentario', 'Comentario',['class'=>'col-md-2 col-form-label']) !!}
<div class="col-md-10">
{!! Form::textarea('comentario', null, ['class'=>'form-control','placeholder'=>'Opcional']) !!}
@error('comentario')
<span class="error-message">{{ $message }}</span>
@enderror
</div>
