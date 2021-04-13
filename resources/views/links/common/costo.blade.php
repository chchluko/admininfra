<label for="costo">Costo Mensual</label>
<input type="text" name="costo" class="form-control {{ $errors->has('costo') ? 'field-error' : '' }}" id="costo" placeholder="Costo Mensual" value="{{ $enlace->costo ?? old('costo') }}">
@if ($errors->has('costo'))
  <span class="error-message">{{ $errors->first('costo') }}</span>
@endif
