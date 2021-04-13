<label for="vigenciagarantia">Vigencia de Garantia</label>
<input type="date" name="vigenciagarantia" class="form-control {{ $errors->has('vigenciagarantia') ? 'field-error' : '' }}"
id="vigenciagarantia" placeholder="Introduzca texto"
value="{{ !empty($vigenciagarantia) ? \Carbon\Carbon::parse($vigenciagarantia)->format('Y-m-d') : old('vigenciagarantia') }}">
@if ($errors->has('vigenciagarantia'))
    <span class="error-message">{{ $errors->first('vigenciagarantia') }}</span>
@endif
