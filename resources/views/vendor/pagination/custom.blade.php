@if ($paginator->hasPages())
    <ul class="pager list-unstyled d-inline-flex">

        @if ($paginator->onFirstPage())
            <li class="disabled p-2"><button type="button" class="btn btn-outline-primary">← Previous</button> </li>
        @else
            <li class="p-2"><a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="btn btn-outline-primary">← Previous</a></li>
        @endif



        @foreach ($elements as $element)

            @if (is_string($element))
                <li class="disabled p-2"><span>{{ $element }}</span></li>
            @endif



            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-link p-2"><button type="button" class="btn btn-primary fw-bold">{{ $page }}</button> </li>
                    @else
                        <li class="p-2"><a href="{{ $url }}" class="btn btn-outline-primary">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach



        @if ($paginator->hasMorePages())
            <li class="p-2"><a href="{{ $paginator->nextPageUrl() }}" rel="next" class="btn btn-outline-primary">Next →</a></li>
        @else
            <li class="disabled p-2"><button type="button" class="btn btn-outline-primary">Next →</button></li>
        @endif
    </ul>
@endif
