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
                <th>Plan</th>
                <th>Linea Telefonica</th>
                <th>Fecha de Inicio</th>
                <th>Plazo</th>
                <th>Fecha de Termino</th>
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
                                <td>{{ $plan->costo }}</td>
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
        @endif
    </form>
</div>
