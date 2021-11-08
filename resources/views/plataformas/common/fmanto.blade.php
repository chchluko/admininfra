{!! Form::label('fmanto', 'Fecha de Mantenimiento') !!}
{!! Form::date('fmanto',null, ['class'=>'form-control']) !!}
@error('fmanto')
<span class="error-message">{{ $message }}</span>
@enderror
