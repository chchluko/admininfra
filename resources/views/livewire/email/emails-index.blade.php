<form class="form" action="{{ route('buscarmail') }}" method="GET">
    <div class="form-group">
        <div class="input-group input-group-lg">
            <input wire:model="search" type="buscarpor"
                class="form-control form-control-lg {{ $errors->has('buscarpor') ? 'field-error' : '' }}"
                placeholder="correo@dominio.com" name="buscarpor" value="{{ old('buscarpor') }}">
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
            <th>Nomina</th>
            <th>Correo</th>
            <th>Nivel</th>
            <th>Status</th>
            <th>Ultima modificacion</th>
            <th>Accion</th>
        </thead>
        <tbody>
            @forelse ($this->results as $result)
            <tr>
                <td>{{ $result->nomina }}</td>
                <td>{{ $result->email }}</td>
                <td>{{ $result->tipo->tipo }}</td>
                <td>@if ($result->status == 1)
                    <span class="badge badge-success"> Activo </span>
                    @else
                    <span class="badge badge-danger"> Baja </span>
                    @endif
                <td>{{ \Carbon\Carbon::parse($result->updated_at)->format('d/m/Y H:i') }}</td>
                </td>
                <td>
                    @can('view password')
                    <a type="link" href="{{ route('emails.show', $result->id) }}" class="btn btn-default"><i
                            class="fas fa-eye"></i></a>
                    @endcan
                    @can('edit password')
                    @if ($result->status == 1)
                    <a type="link" href="{{ route('emails.edit', $result->id) }}" class="btn btn-default"><i
                            class="fas fa-edit"></i></a>
                    <a type="link" href="{{ route('emails.down', $result->id) }}" class="btn btn-default"><i
                            class="fas fa-trash-alt"></i></a>
                    @endif
                    @endcan
                    @role('direccion')
                    <a type="link" href="{{ route('trackingreportemail',$result->id) }}" class="btn btn-default"><i
                            class="fas fa-user-secret"></i></a>
                    @endrole
                </td>
            </tr>

            @empty
            <p>No hay Resultados que coincidan</p>
            @endforelse
        </tbody>
    </table>
    @endif
</form>
