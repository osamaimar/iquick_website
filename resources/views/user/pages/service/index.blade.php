@extends('user.master')


@section('title', __('admin.services'))

@section('page-title', __('admin.services_view_all'))
@section('css')
    <style>
        /* Start Services */
        .services.dark {
            background-color: transparent;
            color: #ffffff;
            margin-bottom: 100px;
        }

        .services.dark .main-title::after {
            background-color: #a5a5a5;
        }

        .services .box {
            width: 100% !important;
        }

        .services .box .card {
            background-color: #fff !important;
            background-clip: border-box !important;
            height: 100% !important;
            padding-bottom: 60px !important;
        }

        .services .box .card {
            background-color: #191e3a !important;
            color: #ffffff !important;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.25);
            border-radius: 12.5px;
            transform: scale(1.02);
        }

        .services .box .card-text {
            font-weight: 400;
            font-size: 19px;
        }

        .services .box .card {
            transition: 0.3s ease-in-out;
            overflow: hidden;
        }

        .services .box .card-title {
            font-size: 20px;
            font-weight: 500;
            margin: 0 10px
        }

        .services .service-btn {
            border: 1px solid #ffffff;
            border-radius: 10px;
            padding: 5px 10px;
            cursor: pointer;
            transform: translateY(120%);
            color: #ffffff;
            background-color: transparent;
            display: block;
            transition: 0.3s ease-in-out;
        }

        .services .box .service-btn {
            transform: translateY(0);
        }

        .services .all-offer a {
            color: #ffffff !important;
        }

        .services .all-offer i,
        .services .all-offer svg,
        .services .all-offer path {
            color: #ffffff !important;
        }

        .postion_customize {
            position: absolute !important;
            bottom: 5px;
            right: 0;
            left: 0;
        }

        /* End Services */
    </style>

    <link href="{{ asset('admin/dark/assets/css/theme.rtl.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/dark/assets/css/custom.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/6495e88b94cf5d49dc5f7d5e/1h3mfb45n';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

    <!-- Modal 2-->
    <div class="modal fade login-modal" id="loginModal6" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel1"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header" id="loginModalLabel1">
                    <h4 class="modal-title">@lang('admin.order_now')</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><svg aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-x">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg></button>
                </div>
                <div class="modal-body">
                    <h6 style="    text-align: center;
                margin-bottom: 9px;">@lang('user.user_descrt')</h6>
                    <form class="mt-0" id="form_order" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="alterErrorletter">
                        </div>
                        <input type="hidden" name="service_id" value="@isset($orderId){{ $orderId }} @endisset" />
                        <div class="col-12 mb-4">
                            {{-- <label>@lang('admin.description')</label> --}}
                            <textarea type="text" name="description_cust" class="form-control">{{ old('description_cust') }}</textarea>
                        </div>
                        <div class="col-12 mb-4">
                            <div class="custom-file-container" data-upload-id="myFirstImage">
                                {{-- <label><a href="javascript:void(0)" class="custom-file-container__image-clear"
                                    title="Clear Image">x</a> @lang('admin.notes')</label> --}}
                                <label class="custom-file-container__custom-file">
                                    <input type="file" name="file" class="form-control">
                                </label>
                            </div>
                        </div>
                        <div id="loader" class="spinner-border text-warning d-none" role="status">
                            <span class="visually-hidden"></span>
                        </div>
                        <button id="btnSubmit" type="submit"
                            class="btn btn-primary mt-2 mb-2 btn-block">@lang('admin.order_now')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="col-lg-8 col-xl-7 col-xxl-6 mx-auto">
                    <form method="get">
                      <div class="mc-field-group input-group form-floating my-4">
                          <input type="text" value="{{request()->input('search')}}" name="search" class="form-control" placeholder="إبحث هنا" id="mce-search">
                          <label for="mce-search">إبحث هنا..</label>
                          <input type="submit" value="بحث" id="mc-embedded-subscribe" class="btn btn-primary">
                      </div>
                    </form>
                  </div>
                  
                <div class="row services" style="justify-content: center;">
                    @foreach ($service as $servic)
                        <div class="col-md-3 col-sm-6 col-12 d-flex px-0 mb-4" style="width: 30%; ">
                            <div class="card text-center h-100 mx-3 rounded-lg" style="background-color: #191e3a;">
                                <div class="card-body d-flex flex-column align-items-center">
                                    <img src="{{
                                            ($servic->img != null) 
                                            ? asset($servic->img)
                                            : asset('assets/img/defaults/service.svg')
                                        }}" 
                                    
                                        class="text-primary mb-3" alt="{{$servic->name}}" style="width: 100px; height: 100px; object-fit: contain"/>
                                    <h3 class="card-title font-weight-bold">
                                        {{$servic->name}}
                                    </h3>
                                    <div class="flex-grow-1">
                                        <p class="mb-4">
                                            {{$servic->small_description}}
                                        </p>
                                    </div>
                                    <div class="mt-4 pt-4 border-top d-flex justify-content-between align-items-center w-100">
                                        <p class="m-0" style="font-size: 24px">{{$servic->price}}$</p>
                                        <a class="btn btn-outline-white text-white rounded"
                                            data-toggle="modal" 
                                           data-target="#modal-service-{{$servic->id}}"
                                           >عرض التفاصيل</a>
                                    </div>
                                </div>
                                <!--/.card-body -->
                            </div>
                            <!--/.card -->
                        </div>

                        <div class="modal fade" id="modal-service-{{$servic->id}}" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered modal-sm">
                                <div class="modal-content text-center">
                                    <div class="modal-body">
                                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        
                                        <img src="{{
                                            ($servic->img != null) 
                                            ? asset($servic->img)
                                            : asset('assets/img/defaults/service.svg')
                                        }}" 
                                                    
                                        class="text-primary mb-3" alt="{{$servic->name}}" style="width: 124px"/>
                        
                        
                                        <h2 class="mb-3">
                                            {{$servic->name}}
                                        </h2>
                        
                                        <p class="lead mb-6">
                                            {!! $servic->description !!}
                                        </p>
                                       
                                        <h3 class="mb-6">
                                            السعر <span class="text-warning">{{$servic->price}}$</span>
                                        </h3>
                        
                                        <a class="btn rounded w-100" style="background: #C5CAE6;  color: #31116F" data-target="#modal-service-buy-{{$servic->id}}" data-dismiss="modal" data-toggle="modal">شراء الخدمة</a>
                                        <a class="btn rounded w-100 mt-4 cancel-btn-1" data-dismiss="modal">إلغاء</a>
                                    </div>
                                    <!--/.modal-content -->
                                </div>
                                <!--/.modal-body -->
                            </div>
                            <!--/.modal-dialog -->
                        </div>
                        <!--/.modal -->
                        
                        <div class="modal fade" id="modal-service-buy-{{$servic->id}}" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered modal-sm">
                                <div class="modal-content text-center">
                                    <div class="modal-body">
                                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>                     
                                        <h2 class="mb-3">
                                            @lang('messages.modal_confirm_order_title')
                                        </h2>
                    
                                        <p class="lead mb-6">
                                            @lang('messages.modal_confirm_order_subtitle')
                                        </p>
                                        
                                            <a class="btn rounded w-100 text-white" style="background: #5C1AC3;" href="{{route('create.payment', $servic->id)}}">
                                                تأكيد
                                            </a>
                    
                                        <a class="btn rounded w-100 mt-4 cancel-btn-1" data-dismiss="modal">إلغاء</a>
                                    </div>
                                    <!--/.modal-content -->
                                </div>
                                <!--/.modal-body -->
                            </div>
                            <!--/.modal-dialog -->
                        </div>
                        <!--/.modal -->
                    @endforeach
                </div>
            </div>
        </div>

    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    {{-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> --}}
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><svg
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg></button>
                </div>
                <div class="modal-body" id="view_all_description_4">

                </div>
                {{-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> --}}
            </div>
        </div>
    </div>
@endsection
@section('ajax')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script>
 $(document).ready(function() {

        @if(isset($orderId))
            var orderId = "{{ $orderId }}";
            if (orderId) {
                $('#loginModal6').modal('show');
                $("#service_id1").val(orderId);
            }
        @endif


    $('#form_order').on('submit', function(e) {
        e.preventDefault();
        $('#btnSubmit').attr("disabled", true);
        var formData = new FormData(this);
        var opError = " ";



        var self = this;

        $.ajax({
            url: "{{ url('profile/serviceorders') }}",
            type: 'POST',
            data: formData,
            beforeSend: function() {
                $('#loader').removeClass('d-none')
            },
            success: function(result) {
                $('#btnSubmit').attr("disabled", false);
                $(self)[0].reset();
                $('.alterErrorletter').html(" ");
                $('#loginModal6').modal('hide');
                swal(result.success, {
                    icon: "success",
                });

            },
                    cache: false,
                    contentType: false,
                    processData: false,
                    error: function(errorsub) {
                        $('#btnSubmit').attr("disabled", false);
                        if (errorsub) {
                            if (errorsub.responseJSON.errors.description_cust) {
                                opError += '<div class="alert alert-danger">' +
                                    errorsub.responseJSON.errors.description_cust + '</div>';
                            } else if (errorsub.responseJSON.errors.file) {
                                opError += '<div class="alert alert-danger">' +
                                    errorsub.responseJSON.errors.file + '</div>';
                            }
                            $('.alterErrorletter').html(" ");
                            $('.alterErrorletter').append(opError);
                        }
                    },
                    complete: function() {
                        $('#loader').addClass('d-none')
                    },
                });
            });
        });
    </script>
    <script>
        setInterval(function() {
            $('.view_all_description').on('click', function() {
                const view_all_description1 = $(this).attr("data-description");
                $("#view_all_description_4").text(view_all_description1);
            });
        }, 500);
    </script>
@endsection
