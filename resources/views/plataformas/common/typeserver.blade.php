{!! Form::label('typesrv_id', 'Tipo de Servidor',['class' => 'col-sm-2 col-form-label']) !!}
<div class="col-md-10">
{!! Form::select('typesrv_id', $typeserver, null, ['class'=>'form-control'])
!!}
        @if ($errors->has('typesrv_id'))
        <span class="error-message">{{ $errors->first('typesrv_id') }}</span>
    @endif
</div>
