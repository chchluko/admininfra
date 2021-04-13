<label for="modelo">Modelo</label>
<input type="text" name="modelo" class="form-control {{ $errors->has('modelo') ? 'field-error' : '' }}"
id="modelo" placeholder="Introduzca texto" value="{{ $modelo ?? old('modelo') }}">
@if ($errors->has('modelo'))
        <span class="error-message">{{ $errors->first('modelo') }}</span>
@endif
