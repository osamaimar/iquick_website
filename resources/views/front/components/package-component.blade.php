<div class="pricing card text-center h-100 mx-3">
    <div class="card-body d-flex flex-column align-items-center">
        <img 
            src="{{
                ($package->img != null) 
                ? asset($package->img)
                : asset('assets/img/defaults/package.svg')
            }}" 

            class="text-primary mb-3" alt="{{$package->name}}" style="width: 100px; height: 100px; object-fit: contain"/>
        <h3 class="card-title">
            {{$package->name}}
        </h3>
        <div class="flex-grow-1 mt-4">
            <ul class="icon-list bullet-bg bullet-primary text-start">
                @foreach($package->services as $service)
                <li class="text-start" >
                    <i class="uil uil-check"></i>
                    {{$service->name}}
                </li>
                @endforeach
            </ul>
        </div>
        <div class="mt-4 pt-4 border-top d-flex justify-content-between align-items-center w-100">
            <p class="m-0" style="font-size: 24px">{{$package->price}}$</p>
            <a class="btn btn-outline-white rounded" 
               data-bs-toggle="modal" 
               data-bs-target="#modal-package-{{$package->id}}">عرض التفاصيل</a>
        </div>
    </div>
    <!--/.card-body -->
</div>
<!--/.card -->