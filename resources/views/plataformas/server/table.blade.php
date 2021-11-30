<table class="table">
    <thead>
        <th>Tipo</th>
        <th>IP</th>
        <th>Marca</th>
        <th>Datacenter</th>
        <th>Modelo</th>
        <th>Número de Serie</th>
        <th>Vigencia (Soporte)</th>
        <th>Ultimo Mantenimiento</th>
        <th>Accion</th>
    </thead>
    <tbody>
        @forelse ($this->results as $hardware)
        <tr>
            <td>{{ $hardware->tipo->name }}</td>
            <td>{{ $hardware->ip }}</td>
            <td>{{ $hardware->marca->marca }}</td>
            <td>{{ $hardware->datacenter->name }}</td>
            <td>{{ $hardware->modelo }}</td>
            <td>{{ $hardware->noserie }}</td>
            <td>{{ $hardware->vigsoporteval }}</td>
            <td>{{ \Carbon\Carbon::parse($hardware->fmanto)->format('d/m/Y') }}</td>
            <td class="py-0 text-right align-middle">
                <div class="btn-group btn-group-sm">
                    <a href="{{ route('servidores.edit',$hardware->id ) }}" class="btn btn-default"><i
                            class="fas fa-edit"></i></a>
                    <a href="{{ route('servidores.show',$hardware->id ) }}" class="btn btn-default"><i
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
