<form class="form" action="{{ route('buscarmail') }}" method="GET">
    <div class="form-group">
        <div class="input-group input-group-lg">
            <input wire:model="search" type="buscarpor"
                class="form-control form-control-lg {{ $errors->has('buscarpor') ? 'field-error' : '' }}"
                placeholder="Datos del enlace abuscar" name="buscarpor" value="{{ old('buscarpor') }}">
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
            <th>Provedor</th>
            <th>Tipo</th>
            <th>Status</th>
            <th>Referencia</th>
            <th>Plazo</th>
            <th>Ancho de banda</th>
            <th>Costo Mensual</th>
            <th>Fecha de contratación</th>
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
                                <td>{{ $result->plazo }} meses</td>
                                <td>{{ $result->anchodebanda }} MB</td>
                                <td>$ {!! number_format($result->costo, 2, '.', ','); !!}</td>
                                <td>{{ \Carbon\Carbon::parse($result->fcontratacion)->format('d/m/Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($result->updated_at)->format('d/m/Y') }}</td>
                                <td class="py-0 text-right align-middle">
                                    <div class="btn-group btn-group-sm">
                                      <a href="{{ route('enlaces.edit',$result->id ) }}" class="btn btn-default"><i class="fas fa-edit"></i></a>
                                      <a href="{{ route('enlaces.show',$result->id ) }}" class="btn btn-default"><i class="fas fa-eye"></i></a>
                                    </div>
                                  </td>
                            </tr>
                            @empty
            <p>No hay Resultados que coincidan</p>
            @endforelse
        </tbody>
    </table>
    @endif
</form>

