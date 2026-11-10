@if ($paginator->hasPages())
    <p>
        @if ($paginator->onFirstPage())
            &laquo; Previous
        @else
            <a href="{{ $paginator->previousPageUrl() }}">&laquo; Previous</a>
        @endif

        | Page {{ $paginator->currentPage() }} of {{ $paginator->lastPage() }} |

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}">Next &raquo;</a>
        @else
            Next &raquo;
        @endif
    </p>
@endif
