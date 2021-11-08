<table class="table">
    <thead>
        <th>Plan</th>
        <th>Linea Telefonica</th>
        <th>Fecha de Inicio</th>
        <th>Plazo</th>
        <th>Fecha de Termino</th>
        <th>Status</th>
        <th>Costo del Plan</th>
        <th>Ultima modificacion</th>
        <th>Accion</th>
    </thead>
    <tbody>
        @foreach ($this->results as $plan)
                    <tr>
                        <td>{{ $plan->tipo->tipo }}</td>
                        <td>{{ $plan->lineatelefonica }}</td>
                        <td>{{ \Carbon\Carbon::parse($plan->inicio)->format('d/m/Y') }}</td>
                        <td>{{ $plan->plazo }}</td>
                        <td>{{ \Carbon\Carbon::parse($plan->fechadetermino)->format('d/m/Y') }}</td>
                        <td>@if ($plan->asignado == 1) Asignado @else Libre @endif</td>
                        <td>$ {!! number_format($plan->costo, 2, '.', ','); !!}</td>
                        <td>{{ \Carbon\Carbon::parse($plan->updated_at)->format('d/m/Y H:i') }}</td>
                        <td class="py-0 text-right align-middle">
                            <div class="btn-group btn-group-sm">
                            <a type="link" href="{{ route('movilplan.edit',$plan->id) }}" class="btn btn-default"><i class="fas fa-edit"></i></a>
                            </div>
                        </td>
                    </tr>
        @endforeach
    </tbody>
</table>
{{ $this->results->links() }}
