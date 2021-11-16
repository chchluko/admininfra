<div>
    @include('partials.search')
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="whist" wire:model="history" name="history">
                <label class="form-check-label" for="whist">Solo activos</label>
                @error('history')
                    <span class="error text-danger">
                        {{ $message }}
                    </span>
                @enderror
            </div>
        @if ($search)
            @include('movil.asignacion.table')
        @else
            @include('movil.asignacion.table')
        @endif
</div>
