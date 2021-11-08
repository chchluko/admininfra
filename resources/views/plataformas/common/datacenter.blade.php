{!! Form::label('center_id', 'Datacenter',['class' => 'col-sm-2 col-form-label']) !!}
<div class="col-md-10">
{!! Form::select('center_id', $datacenters, null, ['class'=>'form-control'])
!!}
        @if ($errors->has('center_id'))
        <span class="error-message">{{ $errors->first('center_id') }}</span>
    @endif
</div>
