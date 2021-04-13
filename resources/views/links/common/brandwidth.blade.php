<label for="anchodebanda">Ancho de Banda (MB)</label>
<input type="text" name="anchodebanda" class="form-control {{ $errors->has('anchodebanda') ? 'field-error' : '' }}" id="anchodebanda" placeholder="MB" value="{{ $enlace->anchodebanda ?? old('anchodebanda') }}">
@if ($errors->has('anchodebanda'))
  <span class="error-message">{{ $errors->first('anchodebanda') }}</span>
@endif
