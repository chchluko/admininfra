    <label for="referencia">Referencia</label>
      <input type="text" name="referencia" class="form-control {{ $errors->has('referencia') ? 'field-error' : '' }}"
      id="referencia" placeholder="Texto de referencia" value="{{ $enlace->referencia ?? old('referencia') }}">
      @if ($errors->has('referencia'))
        <span class="error-message">{{ $errors->first('referencia') }}</span>
      @endif

