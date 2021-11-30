<div>
    @include('partials.search')
    @if ($search)
        @include('plataformas.server.table')
    @else
    <thead>Proximos a terminar soporte</thead>
        @include('plataformas.server.table')
    @endif
</div>
