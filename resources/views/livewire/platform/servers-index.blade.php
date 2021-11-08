<div>
    @include('partials.search')
    @if ($search)
    <table class="table">
        <thead>
            <th>Tipo</th>
            <th>Status</th>
            <th>Marca</th>
            <th>Datacenter</th>
            <th>Modelo</th>
            <th>Número de Serie</th>
            <th>Vigencia (Soporte)</th>
            <th>Ultimo Mantenimiento</th>
            <th>Accion</th>
        </thead>
        <tbody>
            @forelse ($this->results as $result)
            <tr>
                <td>{{ $result->tipo->name }}</td>
                <td>{{ $result->status->status }}</td>
                <td>{{ $result->marca->marca }}</td>
                <td>{{ $result->datacenter->name }}</td>
                <td>{{ $result->modelo }}</td>
                <td>{{ $result->noserie }}</td>
                <td>{{ $result->vigsoporteval }}</td>
                <td>{{ \Carbon\Carbon::parse($result->fmanto)->format('d/m/Y') }}
                </td>
                <td class="py-0 text-right align-middle">
                    <div class="btn-group btn-group-sm">
                        <a href="{{ route('servidores.edit',$result->id ) }}" class="btn btn-default"><i
                                class="fas fa-edit"></i></a>
                        <a href="{{ route('servidores.show',$result->id ) }}" class="btn btn-default"><i
                                class="fas fa-eye"></i></a>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td>No hay Resultados que coincidan</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    {{ $this->results->links() }}
    @endif
</div>
