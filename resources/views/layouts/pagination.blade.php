@if ($paginator->hasPages())
    <div class="pagination">
        @if ($paginator->onFirstPage())
            <a class="disabled">&laquo;</a>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a>
        @endif

        @foreach ($paginator->getUrlRange(1, $paginator->lastPage()) as $page => $url)
            @if ($page == $paginator->currentPage())
                <a class="active-page">{{ $page }}</a>
            @else
                <a href="{{ $url }}">{{ $page }}</a>
            @endif
        @endforeach
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a>
        @else
            <a class="disabled">&raquo;</a>
        @endif
    </div>
@endif
