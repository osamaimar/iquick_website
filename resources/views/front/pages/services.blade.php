@extends('front.layouts.master')

@section('title', 'جميع الخدمات')

@section('css')
@endsection

@section('content')
<section class="vw-100 vh-100 position-absolute top-0 theme-gradient" style="z-index: -1"></section>

<section class="wrapper">
    <div class="container py-12">
        <div class="row text-center mb-10">
            <div class="col-lg-8 col-xl-7 col-xxl-6 mx-auto">
                <h1 class="display-4 text-uppercase mb-3" style="font-size: 45px;">
                    @lang('messages.section_services_title')                        
                </h1>
                <p class="lead" style="font-size: 17px;">
                    @lang('messages.section_services_subtitle')                        
                </p>

                <form method="get">
                    <div class="mc-field-group input-group form-floating mt-12">
                        <input type="text" value="{{request()->input('search')}}" name="search" class="form-control" placeholder="إبحث هنا" id="mce-search">
                        <label for="mce-search">إبحث هنا..</label>
                        <input type="submit" value="بحث" id="mc-embedded-subscribe" class="btn btn-primary">
                    </div>
                </form>
            </div>
            <!-- /column -->
        </div>

      <div class="row gx-md-8 gy-8">
        @foreach($services as $service)
        <div class="col-md-6 col-lg-4">                            
            <x-service-component :service="$service"/>          
        </div>           
        <!--/.swiper-slide -->
        @endforeach
      </div>
      <!--/.row -->
    </div>
    <!-- /.container -->
</section>
<!-- /section -->

@foreach($services as $service)
<div class="modal fade" id="modal-service-{{$service->id}}" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content text-center">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                <img src="{{
                    ($service->img != null) 
                    ? asset($service->img)
                    : asset('assets/img/defaults/service.svg')
                }}" 
                            
                class="text-primary mb-3" alt="{{$service->name}}" style="width: 124px"/>


                <h2 class="mb-3">
                    {{$service->name}}
                </h2>

                <p class="lead mb-6">
                    {!! $service->description !!}
                </p>
               
                <h3 class="mb-6">
                    السعر <span class="text-warning">{{$service->price}}$</span>
                </h3>

                <a class="btn rounded w-100" style="background: #C5CAE6;  color: #31116F" data-bs-target="#modal-service-buy-{{$service->id}}" data-bs-toggle="modal">شراء الخدمة</a>
                <a class="btn rounded w-100 mt-4" style="border: 1px solid #C5CAE6; color: #C5CAE6" data-bs-dismiss="modal">إلغاء</a>
            </div>
            <!--/.modal-content -->
        </div>
        <!--/.modal-body -->
    </div>
    <!--/.modal-dialog -->
</div>
<!--/.modal -->

<div class="modal fade" id="modal-service-buy-{{$service->id}}" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content text-center">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>                     

                @auth
                    <h2 class="mb-3">
                        @lang('messages.modal_confirm_order_title')
                    </h2>

                    <p class="lead mb-6">
                        @lang('messages.modal_confirm_order_subtitle')
                    </p>
                
                    <a class="btn rounded w-100 text-white" style="background: #5C1AC3;" href="{{route('create.payment', $service->id)}}">
                        تأكيد
                    </a>
                @else
                    <i class="uil uil-exclamation-octagon text-warning" style="font-size: 64px"></i>
                
                    
                    <h2 class="mb-3">
                        @lang('messages.modal_no_account_title')
                    </h2>

                    <p class="lead mb-6">
                        @lang('messages.modal_no_account_subtitle')
                    </p>
                
                    <a class="btn rounded w-100 text-white" style="background: #5C1AC3;" data-bs-target="#modal-signup" data-bs-toggle="modal" data-bs-dismiss="modal">
                        إنشاء حساب
                    </a>
                @endif

                <a class="btn rounded w-100 mt-4" style="border: 1px solid #5C1AC3; color: #5C1AC3" data-bs-dismiss="modal">إلغاء</a>
            </div>
            <!--/.modal-content -->
        </div>
        <!--/.modal-body -->
    </div>
    <!--/.modal-dialog -->
</div>
<!--/.modal -->
@endforeach

@endsection

@section('script')
@endsection
