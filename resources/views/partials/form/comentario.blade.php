    <label for="comentario">Comentario</label>
    <textarea class="form-control {{ $errors->has('comentario') ? 'field-error' : '' }}" rows="3"
        name="comentario" placeholder="Opcional">{{ $comentario  ?? old('comentario') }}</textarea>
      @if ($errors->has('comentario'))
          <span class="error-message">{{ $errors->first('comentario') }}</span>
      @endif
