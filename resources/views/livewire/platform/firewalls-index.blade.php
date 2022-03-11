<div>
    @include('partials.search')
    @if ($search)
        @include('plataformas.firewall.table')
    @else
        @include('plataformas.firewall.table')
    @endif
</div>
