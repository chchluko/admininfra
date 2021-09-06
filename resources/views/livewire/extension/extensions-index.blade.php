<div>
    @include('partials.search')
    @if ($search)
    <table class="table">
        <thead>
            <th>Tipo</th>
            <th>Status</th>
            <th>Extension</th>
            <th>Modelo</th>
            <th>Usuario</th>
            <th>Ubicacion</th>
            <th>Modificado</th>
            <th>Accion</th>
        </thead>
        <tbody>
            @forelse ($this->results as $extension)
            <tr>
                <td>{{ $extension->tipo->tipo }}</td>
                <td>@if ($extension->activo == 1)
                    <span class="badge badge-success"> Activa </span>
                    @else
                    <span class="badge badge-info"> Inactiva </span>
                    @endif
                </td>
                <td>{{ $extension->extension }}</td>
                <td>{{ $extension->modelo }}</td>
                <td>
                    @if ($extension->nomina != 0)
                    Nomina: {{ $extension->nomina }}<br>
                    Nombre: {{ $extension->nombre }}<br>
                    Area: {{ $extension->area }}<br>
                    Departamento: {{ $extension->depto }}<br>
                    Puesto: {{ $extension->puesto }}
                    @endif
                </td>
                <td>{{ $extension->ubicacion->NOMBRE_AREA }}</td>
                <td>{{ \Carbon\Carbon::parse($extension->updated_at)->format('d/m/Y') }}</td>
                <td>
                    <a type="link" href="{{ route('extensiones.edit',$extension->id) }}" class="btn btn-default"><i
                            class="fas fa-edit"></i></a>
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
