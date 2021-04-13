<label for="inventario">Número de Inventario (Activo Fijo)</label>
<input type="text" name="inventario" class="form-control {{ $errors->has('inventario') ? 'field-error' : '' }}"
id="inventario"  placeholder="#########" value="{{ $soporte->inventario ?? old('inventario') }}">
@if ($errors->has('inventario'))
        <span class="error-message">{{ $errors->first('inventario') }}</span>
@endif
