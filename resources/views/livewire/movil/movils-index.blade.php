<div>
    @include('partials.search')
    <div class="mt-1">
        <label class="col-sm-2 col-form-label">
            <input type="checkbox" value="1" wire:model="tipo" class="form-checkbox">
            <span class="">Celulares</span>
        </label>
        <label class="col-sm-2 col-form-label">
            <input type="checkbox" value="2" wire:model="tipo" class="form-checkbox">
            <span class="">Tablets</span>
        </label>
    </div>
    @if ($search)
    @include('movil.table')
    @else
    @include('movil.table')
    @endif
</div>
