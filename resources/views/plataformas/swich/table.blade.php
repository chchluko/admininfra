<table class="table">
    <thead>
        <th>IP</th>
        <th>Marca</th>
        <th>Datacenter</th>
        <th>Modelo</th>
        <th>Rack</th>
        <th>Número de Serie</th>
        <th>Accion</th>
    </thead>
    <tbody>
        @forelse ($this->results as $hardware)
        <tr>
            <td>{{ $hardware->ip }}</td>
            <td>{{ $hardware->marca->marca }}</td>
            <td>{{ $hardware->datacenter->name }}</td>
            <td>{{ $hardware->modelo }}</td>
            <td>{{ $hardware->rack }}</td>
            <td>{{ $hardware->noserie }}</td>
            <td class="py-0 text-right align-middle">
                <div class="btn-group btn-group-sm">
                  <a href="{{ route('switchs.edit',$hardware->id ) }}" class="btn btn-default"><i class="fas fa-edit"></i></a>
                  <a href="{{ route('switchs.show',$hardware->id ) }}" class="btn btn-default"><i class="fas fa-eye"></i></a>
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
