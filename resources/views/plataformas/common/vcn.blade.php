{!! Form::label('vcn', 'VCN') !!}
{!! Form::text('vcn', null, ['class'=>'form-control']) !!}
@error('vcn')
<span class="error-message">{{ $message }}</span>
@enderror
