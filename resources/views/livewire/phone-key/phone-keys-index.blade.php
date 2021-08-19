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
            <th>Clave</th>
            <th>Comentario</th>
            <th>Status</th>
            <th>Ultima modificacion</th>
            <th>Accion</th>
        </thead>
        <tbody>
            @foreach ($this->results as $claves)
            <tr>
                <td>{{ $claves->clave }}</td>
                <td>{{ $claves->comentario }}</td>
                <td>@if ($claves->activo == 1)
                    <span class="badge badge-success"> Activa </span>
                    @else
                    <span class="badge badge-info"> Inactiva </span>
                    @endif
                    @if ($claves->asignado == 1)
                    <span class="badge badge-success"> Asignada </span>
                    @else
                    <span class="badge badge-info"> Libre </span>
                    @endif</td>
                <td>{{ \Carbon\Carbon::parse($claves->updated_at)->format('d/m/Y H:i') }}
                </td>
                <td>
                    <a type="link" href="{{ route('clavestelefonicas.edit',$claves->id) }}" class="btn btn-default"><i class="fas fa-edit"></i></a>
                </td>
            </tr>
            @endforeach </tbody>
    </table>{{ $this->results->links() }}
    @else

    @endif
    </form>
</div>
