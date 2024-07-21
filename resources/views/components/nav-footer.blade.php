<ul class="list-unstyled  mb-3 d-flex   justify-content-sm-center gap-5">
    @foreach ($page as $pag)
        <li><a class="text-decoration-none " href="{{ route('page',$pag->id) }}">{{$pag->name}}</a>
        </li>
    @endforeach
</ul>