<div class="card text-center h-100 mx-3">
    <div class="card-body d-flex flex-column align-items-center">
        <img src="{{
                ($service->img != null) 
                ? asset($service->img)
                : asset('assets/img/defaults/service.svg')
            }}" 
        
            class="text-primary mb-3" alt="{{$service->name}}" style="width: 100px; height: 100px; object-fit: contain"/>
        <h3 class="card-title">
            {{$service->name}}
        </h3>
        <div class="flex-grow-1">
            <p class="mb-4">
                {{$service->small_description}}
            </p>
        </div>
        <div class="mt-4 pt-4 border-top d-flex justify-content-between align-items-center w-100">
            <p class="m-0" style="font-size: 24px">{{$service->price}}$</p>
            <a class="btn btn-outline-white rounded"
                data-bs-toggle="modal" 
               data-bs-target="#modal-service-{{$service->id}}"
               >عرض التفاصيل</a>
        </div>
    </div>
    <!--/.card-body -->
</div>
<!--/.card -->