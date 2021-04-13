<label for="inventarioti">Número de Inventario (TI)</label>
<input type="text" name="inventarioti" class="form-control {{ $errors->has('inventarioti') ? 'field-error' : '' }}"
id="inventarioti"  placeholder="#########" value="{{ $soporte->inventarioti ?? old('inventarioti') }}">
@if ($errors->has('inventarioti'))
        <span class="error-message">{{ $errors->first('inventarioti') }}</span>
@endif
