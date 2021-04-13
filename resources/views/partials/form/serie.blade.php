<label for="noserie">Número de Serie</label>
<input type="text" name="noserie" class="form-control {{ $errors->has('noserie') ? 'field-error' : '' }}"
id="noserie" placeholder="########" value="{{ $noserie ?? old('noserie') }}">
@if ($errors->has('noserie'))
    <span class="error-message">{{ $errors->first('noserie') }}</span>
@endif
