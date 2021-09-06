<div>
    @include('partials.search')
    @if ($search)
    <table class="table">
        <thead>
            <th>Provedor</th>
            <th>Tipo</th>
            <th>Status</th>
            <th>Referencia</th>
            <th>Ancho de banda (MB)</th>
            <th>Modificado</th>
            <th>Accion</th>
        </thead>
        <tbody>
            @forelse ($this->results as $result)
            <tr>
                <td>{{ $result->provedor->provedor }}</td>
                <td>{{ $result->status->status }}</td>
                <td>{{ $result->tipo->tipo }}</td>
                <td>{{ $result->referencia }}</td>
                <td>{{ $result->anchodebanda }}</td>
                <td>{{ \Carbon\Carbon::parse($result->updated_at)->format('d/m/Y') }}</td>
                <td class="py-0 text-right align-middle">
                    <div class="btn-group btn-group-sm">
                        <a href="{{ route('enlaces.edit',$result->id ) }}" class="btn btn-default"><i
                                class="fas fa-edit"></i></a>
                        <a href="{{ route('enlaces.show',$result->id ) }}" class="btn btn-default"><i
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
