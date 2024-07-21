<nav aria-label="Page navigation" class="mt-8" style="text-align:center;">
    @if ($paginator->hasPages())
        <ul class="pagination pagination-lg justify-content-end mb-0">

            @if ($paginator->onFirstPage())
                <li class="page-item disabled"><a class="page-link rounded-0" href="#" aria-label="Previous">
                        <i class="fas fa-arrow-left"></i>
                    </a></li>
            @else
                <li class="page-item"><a class="page-link rounded-0" href="{{ $paginator->previousPageUrl() }}"
                        rel="prev" aria-label="Previous">
                        <i class="fas fa-arrow-left"></i>
                    </a></li>
            @endif



            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="page-item" class="disabled"><a class="page-link" href="#">{{ $element }}</a>
                    </li>
                @endif


                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active my-active"><a class="page-link"
                                    href="#">{{ $page }}</a></li>
                        @else
                            <li class="page-item"><a class="page-link"
                                    href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach



            @if ($paginator->hasMorePages())
                <li class="page-item"><a class="page-link rounded-0" href="{{ $paginator->nextPageUrl() }}"
                        rel="next" aria-label="Next">
                        <i class="fas fa-arrow-right"></i>
                    </a></li>
            @else
                <li class="page-item" class="disabled"><a class="page-link rounded-0" href="#" aria-label="Next">
                        <i class="fas fa-arrow-right"></i>
                    </a></li>
            @endif
        </ul>
    @endif
</nav>
