<div>
    <form class="form" action="" method="GET">
        <div class="form-group">
            <div class="input-group input-group-lg">
                <input wire:model="search" type="buscarpor"
                    class="form-control form-control-lg {{ $errors->has('buscarpor') ? 'field-error' : '' }}"
                    placeholder="Dato a buscar..." name="buscarpor" value="{{ old('buscarpor') }}">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-lg btn-default">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </div>
        @if ($search)
        <table class="table">
            <thead>
                <th>Teléfono</th>
                <th>Nombre del plan</th>
                <th>IMEI</th>
                <th>Tipo</th>
                <th>Status</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Número de Serie</th>
                <th>Modificado</th>
                <th>Accion</th>
            </thead>
            <tbody>
        @foreach ($this->results as $movil)
                    <tr>
                        <td>{{ $movil->lineatelefonica->lineatelefonica }}</td>
                        <td>{{ $movil->lineatelefonica->tipo->tipo }}</td>
                        <td>{{ $movil->imei }}</td>
                        <td>{{ $movil->tipo->tipo }}</td>
                        <td>{{ $movil->status->status }}</td>
                        <td>{{ $movil->marca->marca }}</td>
                        <td>{{ $movil->modelo }}</td>
                        <td>{{ $movil->noserie }}</td>
                        <td>{{ \Carbon\Carbon::parse($movil->updated_at)->format('d/m/Y') }}</td>
                        <td class="py-0 text-right align-middle">
                            <div class="btn-group btn-group-sm">
                            <a type="link" href="{{ route('movil.edit',$movil->id) }}" class="btn btn-default"><i class="fas fa-edit"></i></a>
                            </div>
                        </td>
                    </tr>

        @endforeach                </tbody>
        </table>
        {{ $this->results->links() }}
        @endif
    </form>
</div>
