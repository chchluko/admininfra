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
            <th>Alcance</th>
            <th>Status</th>
            <th>Usuario</th>
            <th>Comentario</th>
            <th>Ultima modificacion</th>
            <th>Accion</th>
        </thead>
        <tbody>
    @foreach ($this->results as $clavesasignada)
                <tr>
                    <td>{{ $clavesasignada->clave }}</td>
                    <td>{{ $clavesasignada->alcance }}</td>
                    <td>@if ($clavesasignada->activo == 1)
                            <span class="badge badge-success"> Activo </span>
                        @else
                            <span class="badge badge-danger"> Inactivo </span>
                        @endif
                    </td>
                    <td>Nomina: {{ $clavesasignada->nomina }}<br>
                        Nombre: {{ $clavesasignada->nombre }}<br>
                    Area: {{ $clavesasignada->area }}<br>
                    Departamento: {{ $clavesasignada->depto }}<br>
                    Puesto: {{ $clavesasignada->puesto }}</td>
                    <td>{{ $clavesasignada->comentario }}</td>
                    <td>{{ \Carbon\Carbon::parse($clavesasignada->updated_at)->format('d/m/Y H:i') }}</td>
                    <td>
                        <a type="link" href="{{ route('responsiva_key',$clavesasignada->id) }}" class="btn btn-default"><i class="fas fa-file-pdf"></i></a>
                        <a type="link" href="{{ route('asignacionclaves.edit',$clavesasignada->id) }}" class="btn btn-default"><i class="fas fa-edit"></i></a>
                    </td>
                </tr>
    @endforeach
        </tbody>
    </table>{{ $this->results->links() }}
    @else

    @endif
    </form>
</div>
