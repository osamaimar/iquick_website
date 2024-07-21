@if ($paginator->hasPages())
    <div class="pagination-no_spacing">
        <ul class="pagination justify-content-center">

            @if ($paginator->onFirstPage())
                <li class="page-item"><a class=" rounded-0  " href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a></li>
            @else
                <button class="btn"
                    style="    background-color: #191e3a;
    font-weight: 600;
    color: #888ea8;
        border-top-right-radius: 50px;
    border-bottom-right-radius: 50px;
    "
                    wire:click="previousPage" wire:loading.attr="disabled" rel="prev">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </button>
            @endif



            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="page-item" class=""><a class="" href="#">{{ $element }}</a>
                    </li>
                @endif



                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page === $paginator->currentPage())
                            <li class="page-item"><button style="background: unset;
                                    border: none;
                                    color: #fff;" wire:click="gotoPage({{ $page }})"><a class="active my-active" href="#!"
                                    >{{ $page }}</a></button></li>
                        @else
                            <li class="page-item"><button  style="background: unset;
                                    border: none;
                                    color: #888ea8;"  wire:click="gotoPage({{ $page }})"><a class="" href="#!"
                                    >{{ $page }}</a></button></li>
                        @endif
                    @endforeach
                @endif
            @endforeach



            @if ($paginator->hasMorePages())
                <button class="btn"
                    style="    background-color: #191e3a;
    font-weight: 600;
    color: #888ea8;
        border-top-left-radius: 50px;
    border-bottom-left-radius: 50px;
    "
                    wire:click="nextPage" wire:loading.attr="disabled" rel="next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </button>
            @else
                <li class="page-item"><a class=" rounded-0  " href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a></li>
            @endif
        </ul>
    </div>
@endif
