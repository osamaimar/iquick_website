@extends('user.master')


@section('title', __('admin.packages'))

@section('page-title', __('admin.packages'))
@section('css')
    <style>
    /* Start packages */
.packages.dark {
  background-color: transparent;
  color: #f5f7fb;
  margin-bottom: 100px;
}
.packages.dark .main-title::after {
  background-color: #a5a5a5;
}
.all-offer a {
  transition: 0.5s ease-in-out;
  color: #25d4e3;
  opacity: 0.5;
  text-decoration: none;
  font-size: 25px;
  font-weight: 500;
  transition: 0.5s ease-in-out;
}
.all-offer a {
  opacity: 1;
}
.all-offer a i,
.all-offer a svg,
.all-offer a path {
  transform: translateX(-20px);
}
.all-offer a i,
.all-offer a svg,
.all-offer a path {
  transition: 0.5s ease-in-out;
  color: #25d4e3;
}

.packages .item .card {
  overflow: hidden;
  box-shadow: 0 0 12px rgba(0, 0, 0, 0.25) !important;
  transition: 0.5s ease-in-out;
  background-color: #fff !important;
  background-clip: border-box !important;
  height: 100% !important;
  padding-bottom: 60px !important;
}
.packages .item .card {
  background-color: #191e3a !important;
  color: #f5f7fb !important;
}

.packages .card-img-top {
  width: 30%;
  display: none;
}
.packages .item .container-card-img {
  transition: 0.2s ease-in-out;
  height: 100%;
  display: none !important;
  align-items: center;
  justify-content: center;
}
/* .packages .item .container-card-img {
  height: 0;
} */
.packages .item .card-img-top {
  transition: 0.1s ease-in-out;
}
/* .packages .item .card-img-top {
  display: none;
} */
.packages .item {
  position: relative;
}
.packages .item .card p {
  vertical-align: middle;
  height: auto;
  color: #fff !important;
  margin-bottom: 15px;
}
.packages .item .card p {
  /* opacity: 0;
  height: 0; */
  padding: 2px 0;
}

.packages .name-service {
  display: none;
  justify-content: center;
  flex-wrap: wrap;
  transition: 0.3s ease-in-out;
}

.packages .item .name-service {
  display: flex;
}
.packages .name-service li {
  display: flex;
  align-items: center;
  justify-content: flex-start;
}
.packages .item .icon {
  transition: 0.5s ease-in-out;
  background-color: #191e3a;
  color: #f5f7fb;
  margin-left: 10px;
  flex-basis: 23.33px;
  padding: 5px;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 50%;
}
.packages .item .icon {
  background-color: #f5f7fb;
  color: #191e3a;
}
.footer-card {
  display: flex;
  align-items: center;
  justify-content: space-between;
  position: relative;
  padding: 0 10px !important;
  padding-bottom: 5px !important;
}
.footer-card .icons {
  display: flex;
  align-items: center;
  justify-content: center;
}
.packages .footer-card .bonus {
  transition: 0.3s ease-in-out;
  position: absolute;
  top: 0;
  left: calc(50% - 5%);
  transform: translate(-50%, 0);
}
.packages .item .footer-card .bonus {
  position: absolute;
  top: 50%;
  transform: translate(-50%, -200%);
}
.packages .item .footer-card .icons {
  display: none;
}
.packages .footer-card .show-service {
  display: none;
  border: 1px solid #f5f7fb;
  border-radius: 10px;
  padding: 5px 10px;
  cursor: pointer;
  color: #f5f7fb;
  background-color: transparent;
}
.packages .item .footer-card .show-service {
  display: flex;
}
.postion_customize{
  position: absolute !important;
  bottom: 5px;
  right: 0;
  left: 0;
}
/* Packages page */
/* End packages */
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
<div class="modal fade login-modal" id="loginModal3" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel1"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header" id="loginModalLabel1">
                <h4 class="modal-title">@lang('admin.order_now')</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><svg aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-x">
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
                    <input type="hidden" name="package_id"  value="@isset($orderId){{ $orderId }} @endisset"  />
                    <div class="col-12 mb-4">
                        {{-- <label>@lang('admin.description')</label> --}}
                        <textarea type="text" name="description_cust"
                            class="form-control">{{ old('description_cust') }}</textarea>
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

            <div class="row g-2 packages">
                @foreach ($package as $packag)
                <div class="col-md-3 col-sm-6 col-12 d-flex px-0 mb-4" style="width: 33.33333333%">
                    <div class="pricing card text-center h-100 mx-3">
                      <div class="card-body d-flex flex-column align-items-center">
                          <img 
                              src="{{
                                  ($packag->img != null) 
                                  ? asset($packag->img)
                                  : asset('assets/img/defaults/package.svg')
                              }}" 
                  
                              class="text-primary mb-3" alt="{{$packag->name}}" style="width: 100px; height: 100px; object-fit: contain"/>
                          <h3 class="card-title">
                              {{$packag->name}}
                          </h3>
                          <div class="flex-grow-1 mt-4">
                              <ul class="icon-list bullet-bg bullet-primary text-start">
                                  @foreach($packag->services as $service)
                                  <li class="text-start text-white">
                                    <i class="uil uil-check"></i>
                                      {{$service->name}}
                                  </li>
                                  @endforeach
                              </ul>
                          </div>
                          <div class="mt-4 pt-4 border-top d-flex justify-content-between align-items-center w-100">
                              <p class="m-0" style="font-size: 24px">{{$packag->price}}$</p>
                              <a class="btn btn-outline-white text-white rounded" 
                                data-toggle="modal" 
                                data-target="#modal-package-{{$packag->id}}">عرض التفاصيل</a>
                          </div>
                      </div>
                      <!--/.card-body -->
                  </div>
                  <!--/.card -->
                </div>

                  <div class="modal fade" id="modal-package-{{$packag->id}}" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered modal-sm">
                        <div class="modal-content text-center">
                            <div class="modal-body">
                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                
                                <img src="{{
                                    ($packag->img != null) 
                                    ? asset($packag->img)
                                    : asset('assets/img/defaults/package.svg')
                                }}" 
                                            
                                class="text-primary mb-3" alt="{{$packag->name}}" style="width: 124px"/>
                
                                <h2 class="mb-3">
                                    {{$packag->name}}
                                </h2>
                                
                                <p class="lead mb-6">
                                    {!! $packag->description !!}
                                </p>
                
                                <ul class="icon-list bullet-bg bullet-primary">
                                    @foreach($packag->services as $service)
                                    <li class="text-start text-white">
                                        <i class="uil uil-check"></i>
                                        {{$service->name}}
                                    </li>
                                    @endforeach
                                </ul>
                
                                <div class="divider-icon fs-lg my-4 text-white">{{$packag->price}}$</div>
                
                                <a class="btn btn-outline-white rounded-pill text-white cancel-btn-2" data-dismiss="modal">إلغاء</a>
                                <a class="btn btn-outline-primary rounded-pill" data-target="#modal-package-buy-{{$packag->id}}" data-dismiss="modal" data-toggle="modal">شراء الباقة</a>
                            </div>
                            <!--/.modal-content -->
                        </div>
                        <!--/.modal-body -->
                    </div>
                    <!--/.modal-dialog -->
                </div>
                <!--/.modal -->
                
                <div class="modal fade" id="modal-package-buy-{{$packag->id}}" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered modal-sm">
                        <div class="modal-content text-center">
                            <div class="modal-body">
                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>                     
                
                                      <h2 class="mb-3">
                                        @lang('messages.modal_confirm_order_2_title')
                                    </h2>
                
                                    <p class="lead mb-6">
                                        @lang('messages.modal_confirm_order_2_subtitle')
                                    </p>
                                
                                    <a class="btn rounded w-100 text-white" style="background: #5C1AC3;" class="btn btn-outline-primary rounded-pill" href="{{route('create.payment.packeges', $packag->id)}}">
                                        تأكيد
                                    </a>
                
                                <a class="btn rounded w-100 mt-4" style="border: 1px solid #5C1AC3; color: #5C1AC3" data-dismiss="modal">إلغاء</a>
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
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><svg aria-hidden="true"
          xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
          class="feather feather-x">
          <line x1="18" y1="6" x2="6" y2="18"></line>
          <line x1="6" y1="6" x2="18" y2="18"></line>
      </svg></button>
          </div>
      <div class="modal-body" id="view_all_description_4">

      </div>
      {{-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
            $('#loginModal3').modal('show');
            $("#package_id1").val("{{ $orderId }}");
        }
    @endif

    $('#form_order').on('submit', function(e) {
        e.preventDefault();
        $('#btnSubmit').attr("disabled", true);
        var formData = new FormData(this);
        var opError = " ";

        $.ajax({
            url: `{{ url('profile/packageorders') }}`,
            type: 'POST',
            data: formData,
            beforeSend: function () {
                $('#loader').removeClass('d-none');
            },
            success: function(result) {
                //console.log(result);
                $('#btnSubmit').attr("disabled", false);
                $("#form_order")[0].reset();
                $('.alterErrorletter').html(" ");
                $('#loginModal3').modal('hide');
                swal(result.success, {
                    icon: "success",
                });
                var redirectUrl = "{{ url('payment/packeges') }}/" + order_id_new;
                window.location.href = redirectUrl;
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
            complete: function () {
                $('#loader').addClass('d-none');
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
