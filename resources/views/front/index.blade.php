@extends('front.layouts.master')

@section('title', 'الصفحة الرئيسية')

@section('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
<section class="vw-100 vh-100 position-absolute top-0 theme-gradient" style="z-index: -1"></section>
<section class="wrapper hero-section">
    <div class="container pt-10 pb-12 pt-md-17 pb-md-17">
        <div class="row gx-lg-8 gx-xl-12 gy-10 align-items-center">
            <div class="col-md-12 col-lg-6 text-center text-lg-start order-2 order-lg-0" data-cues="slideInDown" data-group="page-title" data-delay="600" data-disabled="true">
                <h1 class="display-1 mb-5 mx-md-10 mx-lg-0" 
                    data-cue="slideInDown" 
                    data-group="page-title" 
                    data-delay="600" 
                    data-show="true" 
                    style="animation-name: slideInDown; animation-duration: 700ms; animation-timing-function: ease; animation-delay: 600ms; animation-direction: normal; animation-fill-mode: both;">
                    من <span class="text-primary">الإبداع</span> إلى <span class="text-primary">الإنجاز</span> 
                    <br>
                    <span class="ms-lg-8">نحن شريكك في النجاح</span>
                </h1>
                <p class="lead fs-lg mb-7 mt-12" 
                    data-cue="slideInDown" 
                    data-group="page-title" 
                    data-delay="600" 
                    data-show="true" 
                    style="animation-name: slideInDown; animation-duration: 700ms; animation-timing-function: ease; animation-delay: 900ms; animation-direction: normal; animation-fill-mode: both;">
                    @lang('messages.content_banner_desc')
                </p>
                <div class="d-flex flex-column flex-md-row justify-content-center justify-content-lg-start align-items-center mt-lg-12" data-cues="slideInDown" data-group="page-title-buttons" data-delay="900" data-cue="slideInDown" data-disabled="true" data-show="true" style="animation-name: slideInDown; animation-duration: 700ms; animation-timing-function: ease; animation-delay: 900ms; animation-direction: normal; animation-fill-mode: both;">                 
                    <span 
                        data-cue="slideInDown" 
                        data-group="page-title-buttons" 
                        data-delay="900" 
                        data-show="true" 
                        style="animation-name: slideInDown; animation-duration: 700ms; animation-timing-function: ease; animation-delay: 1200ms; animation-direction: normal; animation-fill-mode: both;">
                        
                        @auth 
                            <a href="{{route('user.profile')}}" class="btn btn-md btn-white rounded me-2">لوحة التحكم</a>
                        @else
                                <a class="btn btn-lg btn-white rounded me-2"
                                data-bs-toggle="modal" data-bs-target="#modal-signin"
                            >تسجيل الدخول</a>
                        @endif
                    </span>

                    <span data-cue="slideInDown" 
                        data-group="page-title-buttons" 
                        data-delay="900" 
                        data-show="true" 
                        style="animation-name: slideInDown; animation-duration: 700ms; animation-timing-function: ease; animation-delay: 1200ms; animation-direction: normal; animation-fill-mode: both;"
                        class="fs-lg mx-4">أو</span>

                    <span 
                        data-cue="slideInDown" 
                        data-group="page-title-buttons" 
                        data-delay="900" 
                        data-show="true" 
                        style="animation-name: slideInDown; animation-duration: 700ms; animation-timing-function: ease; animation-delay: 1500ms; animation-direction: normal; animation-fill-mode: both;">
                        
                        @auth 
                            <form method="POST" action="{{route('logout')}}">
                                @csrf
                                @method('post')

                                <button type="submit" class="btn btn-md btn-outline-white rounded">تسجيل الخروج</button>
                            </form>
                        @else
                                <a class="btn btn-lg btn-outline-white rounded"
                                data-bs-toggle="modal" data-bs-target="#modal-signup"
                            >إنشاء حساب</a>
                        @endif
                    </span>
                </div>
            </div>
            <!-- /column -->
            <div class="col-md-12 col-lg-6" data-cue="slideInDown" style="animation-name: slideInDown; animation-duration: 700ms; animation-timing-function: ease; animation-delay: 0ms; animation-direction: normal; animation-fill-mode: both; width: 50%; height: 50%;">
                <figure class="text-center text-lg-end" style="width: 100%; height: 100%;">
                    <img class="w-auto" src="{{asset('assets/images/dash2.svg')}}" alt="" style="width: 100%; height: 100%;">
                </figure>
            </div>
            <!-- /column -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>
<section class="wrapper" id="features">
    <div class="container py-4">
        <div class="row">
            <div class="col-lg-8 col-xl-7 col-xxl-6 text-center text-lg-start">
                <h1 class="display-4 text-uppercase mb-3" style="font-size: 39px;">
                    @lang('messages.section_features_title')
                </h1>
                <p class="lead  mb-7" style="font-size: 16px;">
                    @lang('messages.section_features_subtitle')
                </p>
            </div>
            <!-- /column -->
        </div>
        <!-- /.row -->
        <div class="row gx-md-8 gy-8">
            <div class="col-lg-4 pe-lg-6">
                <div class="card lift feature-card">
                    <div class="card-body">
                        <div class="mb-5" style="width: 36px"> 
                            <img  src="{{asset('assets/img/defaults/cust.svg')}}" style="width:80px;">
                        </div>
                        <h3 class="text-primary">                    
                            @lang('messages.section_features_1_title')                        
                        </h3>
                        <p class="mb-3 text-muted">
                            @lang('messages.section_features_1_subtitle')                        
                        </p>
                    </div>
                </div>
            </div>
            <!--/column -->
            <div class="col-lg-4 pe-lg-6">
                <div class="card mt-lg-8 lift feature-card">
                    <div class="card-body">
                        <div class="mb-5" style="width: 36px"> 
                            <img src="{{asset('assets/img/defaults/trust.svg')}}" style="width:80px;">
                        </div>
                        <h3 class="text-primary">
                            @lang('messages.section_features_2_title')                        
                        </h3>
                        <p class="mb-3 text-muted">
                            @lang('messages.section_features_2_subtitle')                        
                        </p>
                    </div>
                </div>
            </div>
            <!--/column -->
            <div class="col-lg-4 pe-lg-6">
                <div class="card mt-lg-16 lift feature-card">
                    <div class="card-body"> 
                        <div class="mb-5" style="width: 36px"> 
                            <img  src="{{asset('assets/img/defaults/analys.svg')}}" style="width:80px;">
                        </div>
                        <h3 class="text-primary">
                            @lang('messages.section_features_3_title')                        
                        </h3>
                        <p class="mb-3 text-muted">
                            @lang('messages.section_features_3_subtitle')                        
                        </p>
                    </div>
                </div>
            </div>
            <!--/column -->
        </div>
        <!--/.row -->
    </div>
    <!-- /.container -->
</section>
<!-- /section -->
<section class="wrapper">
    <div class="container pt-14 pb-4">
        <div class="card theme-gradient-x">
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-lg-8 col-xl-7 col-xxl-6 mx-auto">
                        <h1 class="display-4 text-uppercase mb-3" style="font-size: 45px;">
                            @lang('messages.section_works_title')                        
                        </h1>
                        <p class="lead mb-10" style="font-size: 16px;">
                            @lang('messages.section_works_subtitle')                        
                        </p>
                    </div>
                    <!-- /column -->
                </div>
                <div class="row gx-lg-8 gx-xl-12 gy-12 position-relative">
                    <div class="col-lg-6 px-lg-10 pb-12">
                        <div class="d-flex flex-row">
                            <div class="pe-4">
                                <div class="bg-soft-warning d-flex justify-content-center align-items-center rounded" style="width: 81px; height: 81px; background: #F1E8FF"> 
                                    <img src="{{asset('assets/img/defaults/plan.svg')}}" style="width: 65px;">
                                </div>                            
                            </div>
                            <div>
                                <h4 class="mb-1">
                                    @lang('messages.section_works_1_title')                        
                                </h4>
                                <p class="mb-0 text-muted">
                                    @lang('messages.section_works_1_subtitle')                        
                                </p>
                            </div>
                        </div>
                    </div>
                    <!--/column -->

                    <div class="m-0 d-flex d-lg-none align-items-center justify-content-center">
                        <hr class="my-0 w-75" style="color: #D2D2D2; height: 0.5px">
                    </div>

                    <div class="col-lg-6 px-lg-10 pb-12">
                        <div class="d-flex flex-row">
                            <div class="pe-4">
                                <div class="bg-soft-warning d-flex justify-content-center align-items-center rounded" style="width: 81px; height: 81px; background: #FFF2F2"> 
                                    <img src="{{asset('assets/img/defaults/ads.svg')}}" style="width: 65px">
                                </div>   
                            </div>
                            <div>
                                <h4 class="mb-1">
                                    @lang('messages.section_works_2_title')                        
                                </h4>
                                <p class="mb-0 text-muted">
                                    @lang('messages.section_works_2_subtitle')                        
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="m-0 d-flex align-items-center justify-content-center">
                        <hr class="my-0 w-75" style="color: #D2D2D2; height: 0.5px">
                    </div>

                    <div class="d-none d-lg-flex" style="    
                        position: absolute;
                        width: 1px;
                        background: white;
                        height: 75%;
                        left: 50%;
                        top: 12.5%;
                        margin: 0;
                        padding: 0;">
                    </div>

                    <!--/column -->
                    <div class="col-lg-6 px-lg-10 pb-12">
                        <div class="d-flex flex-row">
                            <div class="pe-4">
                                <div class="bg-soft-warning d-flex justify-content-center align-items-center rounded" style="width: 81px; height: 81px; background: #E2F3FF"> 
                                    <img src="{{asset('assets/img/defaults/design.svg')}}" style="width: 72px;">
                                </div>   
                            </div>
                            <div>
                                <h4 class="mb-1">
                                    @lang('messages.section_works_3_title')                        
                                </h4>
                                <p class="mb-0 text-muted">
                                    @lang('messages.section_works_3_subtitle')                        
                                </p>
                            </div>
                        </div>
                    </div>
                    <!--/column -->

                    <div class="m-0 d-flex d-lg-none align-items-center justify-content-center">
                        <hr class="my-0 w-75" style="color: #D2D2D2; height: 0.5px">
                    </div>

                    <div class="col-lg-6 px-lg-10 pb-12">
                        <div class="d-flex flex-row">
                            <div class="pe-4">
                                <div class="bg-soft-warning d-flex justify-content-center align-items-center rounded" style="width: 81px; height: 81px; background: #FFE7FB"> 
                                    <img src="{{asset('assets/img/defaults/seo.svg')}}" style="width: 65px">
                                </div>   
                            </div>
                            <div>
                                <h3 class="mb-1">
                                    @lang('messages.section_works_4_title')                        
                                </h3>
                                <p class="mb-0 text-muted">
                                    @lang('messages.section_works_4_subtitle')                        
                                </p>
                            </div>
                        </div>
                    </div>
                    <!--/column -->
                </div>
                <!--/.row -->
            </div>
        </div>
    </div>
    <!-- /.container -->
</section>
<section class="wrapper">
    <div class="container py-12">
        <div class="row text-center  mb-10">
            <div class="col-lg-8 col-xl-7 col-xxl-6 mx-auto">
                <h1 class="display-4 text-uppercase mb-3" style="font-size: 45px;">
                    @lang('messages.section_services_title')                        
                </h1>
                <p class="lead " style="font-size: 16px;">
                    @lang('messages.section_services_subtitle')                        
                </p>
                <a href="{{route('service')}}" class="more hover link-primary">جميع الخدمات</a>
            </div>
        </div>
        <div class="row gx-md-8 gy-8">
            <div class="swiper-container blog grid-view mb-8" data-margin="30" data-nav="true" data-dots="true" data-items-xxl="3" data-items-md="2" data-items-xs="1">
                <div dir="rtl" class="swiper">
                    <div class="swiper-wrapper">
                        <!-- /column -->
                        @foreach($services as $service)
                        <div class="swiper-slide h-auto">
                            <x-service-component :service="$service"/>
                        </div>
                        <!--/.swiper-slide -->
                        @endforeach

                    </div>
                    <!--/.swiper-wrapper -->
                </div>
                <!-- /.swiper -->
            </div>
            <!-- /.swiper-container -->
        </div>
        <!--/.row -->
    </div>
    <!-- /.container -->
</section>
<!-- /section -->
<section class="wrapper">
    <div class="container py-12">
        <div class="row text-center mb-10">
            <div class="col-lg-8 col-xl-7 col-xxl-6 mx-auto">
                <h1 class="display-4 text-uppercase mb-3" style="font-size: 45px;">
                    @lang('messages.section_packages_title')                        
                </h1>
                <p class="lead " style="font-size: 16px;">
                    @lang('messages.section_packages_subtitle')                        
                </p>
                <a href="{{route('package')}}" class="more hover link-primary">جميع الباقات</a>
            </div>
            <!-- /column -->
        </div>
        <div class="row gx-md-8 gy-8">
            <div class="swiper-container blog grid-view mb-8" data-margin="30" data-nav="true" data-dots="true" data-items-xxl="3" data-items-md="2" data-items-xs="1">
                <div dir="rtl" class="swiper">
                    <div class="swiper-wrapper">
                        @foreach($packages as $package)
                        <div class="swiper-slide h-auto">
                            <x-package-component :package="$package"/>
                        </div>
                        <!--/.swiper-slide -->
                        @endforeach
                    </div>
                    <!--/.swiper-wrapper -->
                </div>
                <!-- /.swiper -->
            </div>
            <!-- /.swiper-container -->
        </div>
        <!--/.row -->
    </div>
    <!-- /.container -->
</section>
<!-- /section -->
<section class="wrapper" id="contact">
    <div class="container py-12 pb-4">
        <div class="card theme-gradient-x">
            <div class="card-body">
                <div class="row gx-lg-8 gx-xl-0 gy-10 align-items-center">
                    <!--/column -->
                    <div class="col-lg-5">
                        <h2 class="display-4 mb-3" style="font-size: 45px;">                    
                            @lang('messages.section_contact_title')                        
                        </h2>
                        <p class="lead  mb-8 pe-xl-10" style="font-size: 16px;">
                            @lang('messages.section_contact_subtitle')                        
                        </p>
                        <form id="contact-form" class="contact-form">
                            <div class="form-floating mb-4">
                                <input id="form_name2" type="text" name="name" class="form-control my-6" placeholder="الإسم" required="required" style="background: #C5CAE6; color: #000">
                                <label for="form_name2" style="color: #7074A9">الإسم *</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input id="form_name2" type="text" name="phone" class="form-control my-6" placeholder="رقم الهاتف" required="required" style="background: #C5CAE6; color: #000">
                                <label for="form_name2" style="color: #7074A9">رقم الهاتف *</label>
                            </div>
                            
                            <div class="form-floating mb-4">
                                <input id="form_email2" type="email" name="email" class="form-control my-6" placeholder="البريد الإلكتروني" required="required" style="background: #C5CAE6; color: #000">
                                <label for="form_email2" style="color: #7074A9">البريد الإلكتروني *</label>
                            </div>
                            <div class="form-floating mb-4">
                                <textarea id="form_message2" name="message" class="form-control my-6" placeholder="محتوى الرسالة " style="height: 150px; background: #C5CAE6; color: #000" required></textarea>
                                <label for="form_message2" style="color: #7074A9">محتوى الرسالة *</label>
                            </div>
                            <input type="submit" class="w-100 btn btn-primary rounded btn-send mb-3" value="إرسال" style="background: #6E00FA; border: 0">
                            <p class="text-muted"><strong>*</strong> هذه الحقول ضرورية.</p>
                        </form>
                        <!-- /form -->
                    </div>
                    <!--/column -->

                    <div class="col-lg-7 position-relative justify-content-center">

                        <div class="row">
                            <div class="col-12 d-none d-lg-flex d-flex justify-content-center">
                                <figure><img class="w-auto" src="{{asset('assets/img/contact.svg')}}" alt="" /></figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@foreach($packages as $package)
<div class="modal fade" id="modal-package-{{$package->id}}" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content text-center">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                
                <img src="{{
                    ($package->img != null) 
                    ? asset($package->img)
                    : asset('assets/img/defaults/package.svg')
                }}" 
                            
                class="text-primary mb-3" alt="{{$package->name}}" style="width: 124px"/>

                <h2 class="mb-3">
                    {{$package->name}}
                </h2>
                
                <p class="lead mb-6">
                    {!! $package->description !!}
                </p>

                <ul class="icon-list bullet-bg bullet-primary">
                    @foreach($package->services as $service)
                    <li class="text-start">
                        <i class="uil uil-check"></i>
                        {{$service->name}}
                    </li>
                    @endforeach
                </ul>

                <div class="divider-icon fs-lg my-4">{{$package->price}}$</div>

                <a class="btn btn-outline-white rounded-pill" data-bs-dismiss="modal">إلغاء</a>
                <a class="btn btn-outline-primary rounded-pill" data-bs-target="#modal-package-buy-{{$package->id}}" data-bs-toggle="modal">شراء الباقة</a>
            </div>
            <!--/.modal-content -->
        </div>
        <!--/.modal-body -->
    </div>
    <!--/.modal-dialog -->
</div>
<!--/.modal -->

<div class="modal fade" id="modal-package-buy-{{$package->id}}" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content text-center">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>                     

                @auth
                    <h2 class="mb-3">
                        @lang('messages.modal_confirm_order_2_title')
                    </h2>

                    <p class="lead mb-6">
                        @lang('messages.modal_confirm_order_2_subtitle')
                    </p>
                
                    <a class="btn rounded w-100 text-white" style="background: #5C1AC3;" class="btn btn-outline-primary rounded-pill" href="{{route('create.payment.packeges', $package->id)}}">
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
                
                    <a  class="btn rounded w-100 text-white" style="background: #5C1AC3;" data-bs-target="#modal-signup" data-bs-toggle="modal" data-bs-dismiss="modal">
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

<div class="modal fade" id="modal-contact" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content text-center">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>                     

                    <i class="uil uil-check-circle text-success" style="font-size: 64px"></i>
                
                    
                    <h2 class="mb-3" id="modal-contact-message">
                        تم الإرسال بنجاح!
                    </h2>
            </div>
            <!--/.modal-content -->
        </div>
        <!--/.modal-body -->
    </div>
    <!--/.modal-dialog -->
</div>
<!--/.modal -->

@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        // Set the CSRF token as a default header for all AJAX requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $('#contact-form').submit(function(e) {
            e.preventDefault();

            var formData = $(this).serialize();
            var url = "{{ route('contactstore') }}"; // Set the route URL

            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    $("#modal-contact-message").text(response.success);
                    $("#modal-contact").modal("show");
                    $('#contact-form')[0].reset();
                },
                error: function(xhr, status, error) {
                    // Display the Laravel validation errors if any
                    if (xhr.responseJSON && xhr.responseJSON.errors) {
                        var errors = xhr.responseJSON.errors;
                        var errorMessage = Object.values(errors).join("\n");
                        
                        $("#modal-contact-message").text('يرجى تفقد كل الحقول');
                    } else {
                        $("#modal-contact-message").text('يبدو انه يوجد مشكلة، الرجاء المحاولة لاحقا');
                    }
                    
                    $("#modal-contact").modal("show");
                }
            });
        });
    });
</script>
@endsection
