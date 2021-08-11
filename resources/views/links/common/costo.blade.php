{!! Form::label('costo', 'Costo Mensual') !!}
{!! Form::text('costo', null, ['class'=>'form-control','placeholder'=>'$ 0.00']) !!}
@error('costo')
<span class="error-message">{{ $message }}</span>
@enderror
