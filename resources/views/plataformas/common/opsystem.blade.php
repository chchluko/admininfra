{!! Form::label('system_id', 'Sistema Operativo',['class' => 'col-sm-2 col-form-label']) !!}
<div class="col-md-10">
{!! Form::select('system_id', $opsystem, null, ['class'=>'form-control'])
!!}
        @if ($errors->has('system_id'))
        <span class="error-message">{{ $errors->first('system_id') }}</span>
    @endif
</div>
