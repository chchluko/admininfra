<div>
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Liberación de Equipo Movil</h3>
            <div class="card-tools">

            </div>
        </div>
        <!-- /.card-header -->
        @include('partials.alert')

        <div class="card-body">
            <div class="form-group row">
                <label for="warehouse_id" class="il-gray fs-14 fw-500 align-center">{{ __("Almacenes") }}</label>
                <select
                    wire:model="warehouse_id"
                    id="warehouse_id"
                    class="form-control ih-medium ip-light radius-xs b-light {{ ($errors->has('warehouse_id') ? ' is-invalid' : null) }}">
                    <option value="">{{ __("Selecciona un Almacen") }}</option>
                    @if(count($warehouses) > 0)
                        @foreach ($warehouses as $id => $name)
                            <option value="{{ $id }}">{{ $name }}</option>
                        @endforeach
                    @endif
                </select>
                @error("warehouse_id")<div class="invalid-feedback">{{ $errors->first("warehouse_id") }}</div>@enderror
            </div>
        </div>
        <!-- /.card-body -->
        <div class="clearfix card-footer">
            <button wire:click="store()" class="float-right btn btn-primary">Liberar</button>
        </div>
    </div>
</div>
