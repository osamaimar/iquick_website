
@if ($paginator->hasPages())
    <div class="pagination-no_spacing">
        <ul class="pagination justify-content-center">
       
        @if ($paginator->onFirstPage())
            <li class="page-item disabled"><a class=" rounded-0" href="#" aria-label="Previous">
                       <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
            </a></li>
        @else
            <li class="page-item"><a class=" rounded-0" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
            </a></li>
        @endif


      
        @foreach ($elements as $element)
           
            @if (is_string($element))
                <li class="page-item" class="disabled"><a class="" href="#">{{ $element }}</a></li>
            @endif


           
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item "><a class="active my-active" href="#">{{ $page }}</a></li>
                    @else
                        <li class="page-item"><a class="" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach


        
        @if ($paginator->hasMorePages())
            <li class="page-item"><a class=" rounded-0" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
                              <span class="sr-only">Next</span>
            </a></li>
        @else
            <li class="page-item" class="disabled"><a class=" rounded-0" href="#" aria-label="Next"> 
            <span aria-hidden="true">&raquo;</span>
                              <span class="sr-only">Next</span>
            </a></li>
        @endif
    </ul>
</div>
@endif 