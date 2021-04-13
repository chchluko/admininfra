<form class="form" action="{{ route( $target ) }}" method="GET">
    <div class="form-group row">
        <div class="col-6">
            {!! Form::select('tipo', $filtro, 0, ['class' => 'form-control']) !!}
            @error('tipo')
                <span class="help-block">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-6">
            <div class="input-group">
                <input type="search" class="form-control {{ $errors->has('nombre') ? 'field-error' : '' }}"
                placeholder="Introduzca el texto" name="nombre" value="{{ old('nombre') }}">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
            @error('nombre')
                <span class="help-block">{{ $message }}</span>
            @enderror
        </div>
    </div>
</form>
