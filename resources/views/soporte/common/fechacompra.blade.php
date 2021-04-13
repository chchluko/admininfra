<label for="fechadecompra">Fecha de Compra</label>
<input type="date" name="fechadecompra" class="form-control {{ $errors->has('fechadecompra') ? 'field-error' : '' }}"
id="fechadecompra"
value="{{ !empty($soporte->fechadecompra) ? \Carbon\Carbon::parse($soporte->fechadecompra)->format('Y-m-d') : old('fechadecompra') }}">
@if ($errors->has('fechadecompra'))
    <span class="error-message">{{ $errors->first('fechadecompra') }}</span>
@endif
