@extends('user.master')


@section('title', __('admin.pay'))
@section('css')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@300&display=swap');

        body {
            font-family: 'Cairo';
        }

        span {
            font-size: 15px;
        }

        .total {
            font-size: 15px;
        }

        .card {
            box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0, 0, 0, .125);
            border-radius: 1rem;
        }

        .card-body {
            -webkit-box-flex: 1;
            -ms-flex: 1 1 auto;
            flex: 1 1 auto;
            padding: 1.5rem 1.5rem;
        }
    </style>

@endsection
@section('content')

    <div class="container">
        
        
              <!-- Modal 2-->
        <div class="modal fade login-modal" id="loginModal6" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-header" id="loginModalLabel1">
                        <h4 class="modal-title">@lang('admin.order_now')</h4>

                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </button>

                    </div>

                    <div class="modal-body">
                        <h6 style="text-align: center; margin-bottom: 9px;">@lang('user.user_descrt')</h6>
                        <form class="mt-0" id="form_order1" method="post" enctype="multipart/form-data" action="{{url('profile\storecommentservice')}}">
                            @csrf
                            <div class="col-12 mb-4">
                                <input type="hidden" id="order_id" name="order_id">
                                <textarea type="text" name="comments" class="form-control">{{ old('description_cust') }}</textarea>
                            </div>
                            <div class="col-12 mb-4">
                                <div class="custom-file-container" data-upload-id="myFirstImage">
                                    <label class="custom-file-container__custom-file">
                                        <input type="file" name="file" class="form-control">
                                    </label>
                                </div>
                            </div>
                            <button id="btnSubmit" type="submit" class="btn btn-primary mt-2 mb-2 btn-block">@lang('admin.order_now')</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <form class="mt-0" id="form_order" method="post" style="display:none;">
            @csrf
            <input type="hidden" name="service_id" id="service_id" value="{{ $orders->id }}" />
        </form>
        
        <h1 class="h3 mb-5">الدفع</h1>
        <div class="row">
            <!-- Left -->
            <div class="col-lg-9">
                <div class="accordion" id="accordionPayment">
                    <!-- PayPal -->
                    <div class="accordion-item mb-3 border">
                        <h2 class="h5 px-4 py-3 accordion-header d-flex justify-content-between align-items-center">
                            <div class="form-check w-100 collapsed" data-bs-toggle="collapse" data-bs-target="#collapsePP"
                                aria-expanded="false">
                                <input class="form-check-input" type="radio" name="payment" id="payment2" checked>
                                <label class="form-check-label pt-1" for="payment2">
                                    PayPal
                                </label>
                            </div>
                            <span>
                                <svg width="103" height="25" xmlns="http://www.w3.org/2000/svg">
                                    <g fill="none" fill-rule="evenodd">
                                        <path
                                            d="M8.962 5.857h7.018c3.768 0 5.187 1.907 4.967 4.71-.362 4.627-3.159 7.187-6.87 7.187h-1.872c-.51 0-.852.337-.99 1.25l-.795 5.308c-.052.344-.233.543-.505.57h-4.41c-.414 0-.561-.317-.452-1.003L7.74 6.862c.105-.68.478-1.005 1.221-1.005Z"
                                            fill="#009EE3"></path>
                                        <path
                                            d="M39.431 5.542c2.368 0 4.553 1.284 4.254 4.485-.363 3.805-2.4 5.91-5.616 5.919h-2.81c-.404 0-.6.33-.705 1.005l-.543 3.455c-.082.522-.35.779-.745.779h-2.614c-.416 0-.561-.267-.469-.863l2.158-13.846c.106-.68.362-.934.827-.934h6.263Zm-4.257 7.413h2.129c1.331-.051 2.215-.973 2.304-2.636.054-1.027-.64-1.763-1.743-1.757l-2.003.009-.687 4.384Zm15.618 7.17c.239-.217.482-.33.447-.062l-.085.642c-.043.335.089.512.4.512h2.323c.391 0 .581-.157.677-.762l1.432-8.982c.072-.451-.039-.672-.38-.672H53.05c-.23 0-.343.128-.402.48l-.095.552c-.049.288-.18.34-.304.05-.433-1.026-1.538-1.486-3.08-1.45-3.581.074-5.996 2.793-6.255 6.279-.2 2.696 1.732 4.813 4.279 4.813 1.848 0 2.674-.543 3.605-1.395l-.007-.005Zm-1.946-1.382c-1.542 0-2.616-1.23-2.393-2.738.223-1.507 1.665-2.737 3.206-2.737 1.542 0 2.616 1.23 2.394 2.737-.223 1.508-1.664 2.738-3.207 2.738Zm11.685-7.971h-2.355c-.486 0-.683.362-.53.808l2.925 8.561-2.868 4.075c-.241.34-.054.65.284.65h2.647a.81.81 0 0 0 .786-.386l8.993-12.898c.277-.397.147-.814-.308-.814H67.6c-.43 0-.602.17-.848.527l-3.75 5.435-1.676-5.447c-.098-.33-.342-.511-.793-.511h-.002Z"
                                            fill="#113984"></path>
                                        <path
                                            d="M79.768 5.542c2.368 0 4.553 1.284 4.254 4.485-.363 3.805-2.4 5.91-5.616 5.919h-2.808c-.404 0-.6.33-.705 1.005l-.543 3.455c-.082.522-.35.779-.745.779h-2.614c-.417 0-.562-.267-.47-.863l2.162-13.85c.107-.68.362-.934.828-.934h6.257v.004Zm-4.257 7.413h2.128c1.332-.051 2.216-.973 2.305-2.636.054-1.027-.64-1.763-1.743-1.757l-2.004.009-.686 4.384Zm15.618 7.17c.239-.217.482-.33.447-.062l-.085.642c-.044.335.089.512.4.512h2.323c.391 0 .581-.157.677-.762l1.431-8.982c.073-.451-.038-.672-.38-.672h-2.55c-.23 0-.343.128-.403.48l-.094.552c-.049.288-.181.34-.304.05-.433-1.026-1.538-1.486-3.08-1.45-3.582.074-5.997 2.793-6.256 6.279-.199 2.696 1.732 4.813 4.28 4.813 1.847 0 2.673-.543 3.604-1.395l-.01-.005Zm-1.944-1.382c-1.542 0-2.616-1.23-2.393-2.738.222-1.507 1.665-2.737 3.206-2.737 1.542 0 2.616 1.23 2.393 2.737-.223 1.508-1.665 2.738-3.206 2.738Zm10.712 2.489h-2.681a.317.317 0 0 1-.328-.362l2.355-14.92a.462.462 0 0 1 .445-.363h2.682a.317.317 0 0 1 .327.362l-2.355 14.92a.462.462 0 0 1-.445.367v-.004Z"
                                            fill="#009EE3"></path>
                                        <path
                                            d="M4.572 0h7.026c1.978 0 4.326.063 5.895 1.45 1.049.925 1.6 2.398 1.473 3.985-.432 5.364-3.64 8.37-7.944 8.37H7.558c-.59 0-.98.39-1.147 1.449l-.967 6.159c-.064.399-.236.634-.544.663H.565c-.48 0-.65-.362-.525-1.163L3.156 1.17C3.28.377 3.717 0 4.572 0Z"
                                            fill="#113984"></path>
                                        <path
                                            d="m6.513 14.629 1.226-7.767c.107-.68.48-1.007 1.223-1.007h7.018c1.161 0 2.102.181 2.837.516-.705 4.776-3.793 7.428-7.837 7.428H7.522c-.464.002-.805.234-1.01.83Z"
                                            fill="#172C70"></path>
                                    </g>
                                </svg>
                            </span>
                        </h2>

                    </div>
                </div>
            </div>

            <!-- Right -->
            <div class="col-lg-3">
                <div class="card position-sticky top-0">
                    <div class="p-3 bg-opacity-10" style="background-color: #060818;">
                        <h6 class="card-title mb-3">تفاصيل الطلب</h6>
                        <div class="d-flex justify-content-between mb-1">
                            <span>الباقه</span> <span>{{ $orders->name }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-1 small">
                            <span>القسم</span>  <span>خدمة</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between mb-4">
                            <span>الاجمالي</span> <strong class="text-white">${{ $orders->price }}</strong>
                        </div>
                        <div id="paypal-button-container"></div>
                    </div>
                </div>
            </div>
        </div>
        <form class="mt-0" id="form_order" method="post" style="display:none;">
            @csrf
            <input type="hidden" name="service_id" id="service_id" value="{{ $orders->id }}" />
        </form>
    </div>

@endsection

@section('ajax')
    <script src="https://www.paypal.com/sdk/js?client-id=AczB14wO8ZJDN5OkZSkL31XhwZYyhopot-zChaeIxn2_9HLEVMa65W8uANIq6A9czaemEQDH-HQbc_3k"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
        <script>
        $(document).ready(function() {


            paypal.Buttons({
                style: {
                    layout: 'horizontal',
                    color: 'blue',
                    label: 'paypal'
                },

                createOrder: function(data, actions) {
                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                currency_code: 'USD',
                                value: '{{ $orders->price }}'
                            }
                        }]
                    });
                },

                onApprove: function(data, actions) {

                    return actions.order.capture().then(function() {
                        var formData = new FormData($("#form_order")[0]);
                        var opError = " ";

                        $.ajax({
                            url: `{{ url('profile/serviceorders') }}`,
                            type: 'POST',
                            data: formData,
                            success: function(result) {
                                var orderID = result.order.id;
                                $('#order_id').val(orderID);
                                $('#loginModal6').modal('show');
                            },
                            cache: false,
                            contentType: false,
                            processData: false,
                        });
                    })
                },

                onError: function(err) {
                    swal("حدثت مشكله اثناء عمليه الدفع", {
                        icon: "error",
                    });
                }

            }).render('#paypal-button-container');
        });
    </script>

@endsection
