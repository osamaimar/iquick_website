@extends('user.master')


@section('title', __('admin.attachments'))

@section('page-title', __('admin.attachments'))

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

{{-- <div style="text-align: end;"><button class="btn btn-info mb-2 chatproblem" >@lang('admin.chat_problem')</button></div> --}}
@if($order->type_order=="package")
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="d-flex align-items-center justify-content-between">
                    <h3>{{ $order->user->firstname.' '.$order->user->lastname }}</h3>
                    <h3>
                        @if ($order->type_order == 'service')
                            @lang('admin.services')/ {{ $order->service->name }}
                        @else
                            @lang('admin.packages')/ {{ $order->package->name }}
                        @endif
                    </h3>
                </div>
                <div class="table-responsive mb-4 mt-4">
                    <table id="zero-config" class="table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>@lang('admin.services')</th>
                                <th>@lang('admin.num_service')</th>
                                <th>@lang('admin.num_service_done')</th>
                                <th>@lang('admin.num_service_pending')</th>
                                <th class="no-content">@lang('admin.status')</th>
                                <th class="no-content">@lang('admin.action')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->packageArchives as $key=>$service)
                                <tr>
                                    <td>{{ $service->service_name }}</td>
                                    <td>{{ DB::table('package_service')->where("service_id",$service->service_id)->first()->num_service }}</td>
                                    <td>{{ $service->num_service }}</td>
                                    <td>{{ (DB::table('package_service')->where("service_id",$service->service_id)->first()->num_service-$service->num_service) }}</td>
                                    <td>
                                        @if ($service->status=='1')
                                            <span class="badge outline-badge-secondary shadow-none">@lang('admin.done')</span>
                                        @else
                                            <span class="badge outline-badge-primary shadow-none">@lang('admin.pending')</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($service->status=='1'||(DB::table('package_service')->where("service_id",$service->service_id)->first()->num_service-$service->num_service)<=0)
                                            
                                        @else
                                        <a href="#" class="btn btn-primary add_attach" data1-id="{{ $order->id }}" data-id="{{ $service->service_id }}"
                                            data-toggle="modal" data-target="#loginModal6">@lang('admin.order_now')</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- Modal 2-->
<div class="modal fade login-modal" id="loginModal6" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel1"
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
            <form class="mt-0" id="form_order" method="post" enctype="multipart/form-data">
                @csrf
                <div class="alterErrorletter">
                </div>
                <input type="hidden"  name="service_id" id="service_id1">
                <input type="hidden"  name="order_id" id="order_id1">
                <div class="col-12 mb-4">
                    <label>@lang('admin.description')</label>
                    <textarea type="text" name="description"
                        class="form-control">{{ old('description') }}</textarea>
                </div>
                <div class="col-12 mb-4">
                    <div class="custom-file-container" data-upload-id="myFirstImage">
                        <label><a href="javascript:void(0)" class="custom-file-container__image-clear"
                                title="Clear Image">x</a> @lang('admin.notes')</label>
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
@endif
    @livewire('user.search-attachment-order', [$order->id])
@endsection
@section('ajax')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script>
$(document).ready(function() {
    $('.add_attach').on('click', function() {
        const order_id_new = $(this).attr("data-id");
        $("#service_id1").val(order_id_new);
        const order_id_new1 = $(this).attr("data1-id");
        $("#order_id1").val(order_id_new1);
    });
    $('#form_order').on('submit', function(e) {
        e.preventDefault();
        $('#btnSubmit').attr("disabled", true);
        var formData = new FormData(this);
        var opError = " ";
        $.ajax({
            url: `{{ url('profile/stocks') }}`,
            type: 'POST',
            data: formData,
            beforeSend: function () {
                $('#loader').removeClass('d-none')
            },
            success: function(result) {
                //console.log(result);
                $('#btnSubmit').attr("disabled", false);
                $("#form_order")[0].reset();
                $('.alterErrorletter').html(" ");
                $('#loginModal6').modal('hide');
                swal(result.success, {
                    icon: "success",
                });
                location.reload();
            },
            cache: false,
            contentType: false,
            processData: false,
            error: function(errorsub) {
                $('#btnSubmit').attr("disabled", false);
                if (errorsub) {
                    if (errorsub.responseJSON.errors.description) {
                        opError += '<div class="alert alert-danger">' +
                            errorsub.responseJSON.errors
                            .description + '</div>';
                    } else if (errorsub.responseJSON.errors
                        .file) {
                        opError += '<div class="alert alert-danger">' +
                            errorsub.responseJSON.errors
                            .file + '</div>';
                    }
                    $('.alterErrorletter').html(" ");
                    $('.alterErrorletter').append(opError);
                }
            },
            complete: function () {
                $('#loader').addClass('d-none')
            },
        });
    });
});
</script>
@endsection