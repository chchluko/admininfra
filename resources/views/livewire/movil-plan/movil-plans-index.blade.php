<div>
    @include('partials.search')
        @if ($search)
            @include('movil.plan.table')
        @else
            @include('movil.plan.table')
        @endif
</div>
