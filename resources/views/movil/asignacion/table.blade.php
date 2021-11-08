<table class="table">
    <thead>
        <th>IMEI</th>
        <th>Linea</th>
        <th>Status</th>
        <th>Usuario</th>
        <th>Equipo</th>
        <th>Ultima modificación</th>
        <th>Accion</th>
    </thead>
<tbody>
    @foreach ($this->results as $movilasignado)
                <tr>
                    <td>{{ $movilasignado->imei->imei }}</td>
                    <td>{{ $movilasignado->imei->lineatelefonica->lineatelefonica }}</td>
                    <td>@if ($movilasignado->activo == 1)
                            <span class="badge badge-success"> Activo </span>
                        @else
                            <span class="badge badge-danger"> Historico </span>
                        @endif
                    </td>
                    <td><b>Nomina:</b> {{ $movilasignado->nomina }}<br>
                        <b>Nombre:</b> {{ $movilasignado->nombre }}<br>
                    <b>Area:</b> {{ $movilasignado->area }}<br>
                    <b>Departamento:</b> {{ $movilasignado->depto }}<br>
                    <b>Puesto:</b> {{ $movilasignado->puesto }}</td>
                    <td><b>Modelo:</b> {{ $movilasignado->imei->modelo }} <br>
                    <b>N. Serie:</b> {{ $movilasignado->imei->noserie }} <br>
                    <b>Marca:</b> {{ $movilasignado->imei->marca->marca }}</td>
                    <td>{{ \Carbon\Carbon::parse($movilasignado->updated_at)->format('d/m/Y H:i') }}</td>
                    <td class="py-0 text-right align-middle">
                        <div class="btn-group btn-group-sm">
                            <a type="link" href="{{ route('asignacionmovil.edit',$movilasignado->id) }}" class="btn btn-default">
                                <i class="fas fa-edit"></i>
                            </a>
                                @if ($movilasignado->activo == 1)
                                    <a type="link" href="{{ route('responsiva_movil',$movilasignado->id) }}" class="btn btn-default">
                                        <i class="fas fa-file-pdf"></i>
                                    </a>
                                @else
                                    <a type="link" href="{{ route('liberacion_movil',$movilasignado->id) }}" class="btn btn-default">
                                        <i class="fas fa-unlock"></i>
                                    </a>
                                @endif
                        </div>
                    </td>
                </tr>
    @endforeach
</tbody>
</table>{{ $this->results->links() }}
