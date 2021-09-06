<form class="form" action="" method="GET" onkeydown="return event.key != 'Enter';">
    <div class="form-group">
        <div class="input-group input-group-lg">
            <input wire:model="search" type="buscarpor"
                class="form-control form-control-lg {{ $errors->has('buscarpor') ? 'field-error' : '' }}"
                placeholder="Dato a buscar..." name="buscarpor" value="{{ old('buscarpor') }}">
        </div>
    </div>
</form>
