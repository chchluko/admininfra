<label for="fcontratacion">Fecha de contratación</label>
<input type="date" name="fcontratacion" class="form-control {{ $errors->has('fcontratacion') ? 'field-error' : '' }}"
id="fcontratacion"
value="{{ !empty($enlace->fcontratacion) ? \Carbon\Carbon::parse($enlace->fcontratacion)->format('Y-m-d') : old('fcontratacion') }}">
@if ($errors->has('fcontratacion'))
  <span class="error-message">{{ $errors->first('fcontratacion') }}</span>
@endif
