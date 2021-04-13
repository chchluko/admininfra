<label for="plazo">Plazo (meses)</label>
<input type="number" name="plazo" class="form-control {{ $errors->has('plazo') ? 'field-error' : '' }}" id="plazo" placeholder="Meses" value="{{ $enlace->plazo ?? old('plazo') }}">
@if ($errors->has('plazo'))
  <span class="error-message">{{ $errors->first('plazo') }}</span>
@endif
