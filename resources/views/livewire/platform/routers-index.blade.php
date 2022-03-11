<div>
    @include('partials.search')
    @if ($search)
        @include('plataformas.router.table')
    @else
        @include('plataformas.router.table')
    @endif
</div>
