<div>
    @include('partials.search')
        @if ($search)
            @include('movil.asignacion.table')
        @else
            @include('movil.asignacion.table')
        @endif
</div>
