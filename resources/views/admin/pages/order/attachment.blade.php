@extends('admin.master')


@section('title', __('admin.attachments'))

@section('page-title', __('admin.attachments'))

@section('content')
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
            {{--<div class="row">
                <div class="col-12 mb-2">
                <div class="card shadow p-3 mb-5 bg-body rounded" style="width:100%;">
                    <div class="card-body">
                        <h5 class="card-title">@lang('admin.description')</h5>
                        <p class="card-text">@if ($order->description_cust!=null)
                             //echo nl2br(e($order->description_cust));  
                            @else
                            <div class="alert alert-warning text-center" role="alert">
                                <h4>@lang("admin.textnote")</h4>
                              </div>
                        @endif</p>
                    </div>
                    </div>
                </div>
                @can('download-file')
                    @if ($order->file != null)
                    <div class="col-12">
                        <div class="card shadow p-3 mb-5 bg-body rounded" style="width: 10rem;">
                            @if(in_array(explode(".",$order->file)[1],['png','jpg','webp','jpeg']))
                            <a href="{{ route('admin.download', $order->file) }}"><img
                                    src="{{ asset('assets/images/download/Download-Icon.png') }}" class="card-img-top" /></a>
                            @else
                            <a href="{{ route('admin.download', $order->file) }}"><img
                                    src="{{ asset('assets/images/download/Download-Icon.png') }}" class="card-img-top" /></a>
                            @endif
                            <div class="card-body">
                                <a href="{{ route('admin.download', $order->file) }}"> <h5 class="card-title">@lang('admin.download')</h5></a>
                            </div>
                        </div>
                    </div>
                    @endif
                @endcan
            </div> --}}
            <div class="table-responsive mb-4 mt-4">
                <table id="zero-config" class="table table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>@lang('admin.code')</th>
                            <th>@lang('admin.description')</th>
                            <th class="no-content">@lang('admin.download')</th>
                        </tr>
                    </thead>
                    <tbody>
                                                <tr>
                            <td>{{ $order->code }}</td>
                            <td>
                                @if ($order->comment)
                                    {!! nl2br(e($order->comment->comments)) !!}
                                @else
                                    <div class="badge badge-warning">
                                        @lang("admin.textnote")
                                    </div>
                                @endif
                            </td>
                            <td>
                                @can('download-file')
                                    @if ($order->comment && $order->comment->filed_name)
                                        <div class="d-flex align-items-center">
                                            @if (in_array(explode(".", $order->comment->filed_name)[1], ['png', 'jpg', 'webp']))
                                                <a href="{{ route('admin.download', $order->comment->filed_name) }}">
                                                    <img style="width: 35px;height: 35px;"
                                                         src="{{ asset('storage/images/orders/attachments/'.$order->comment->filed_name) }}" />
                                                </a>
                                            @else
                                                <a href="{{ route('admin.download', $order->comment->filed_name) }}">
                                                    <img style="width: 35px;height: 35px;"
                                                         src="{{ asset('assets/images/download/Download-Icon.png') }}" />
                                                </a>
                                            @endif
                                        </div>
                                    @else
                                        <div class="badge badge-warning">
                                            @lang("admin.textnote")
                                        </div>
                                    @endif
                                @endcan
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@livewire('admin.search-attachment-order', [$order->id])
<!-- Modal 2-->
<div class="modal fade login-modal" id="loginModal1" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel1"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header" id="loginModalLabel1">
                <h4 class="modal-title">@lang('admin.attachments')</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><svg aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg></button>
            </div>
            <div class="modal-body">
                <form class="mt-0" id="form_attach" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="alterErrorletter">
                    </div>
                    <input type="hidden" name="order_id" id="order_id1" />
                    <div class="col-12 mb-4">
                        <input type="text" name="name_attach" value="{{ old('name_attach') }}" class="form-control"
                            placeholder=@lang('admin.name_attach')>
                    </div>
                    <div class="col-12 mb-4">
                        <textarea type="text" name="description" value="{{ old('description') }}" rows="8" class="form-control"
                            placeholder="{{__('admin.description')}}"></textarea>
                    </div>
                    <div class="col-12 mb-4">
                        <div class="custom-file-container" data-upload-id="myFirstImage">
                            <label><a href="javascript:void(0)" class="custom-file-container__image-clear"
                                    title="Clear Image">x</a> @lang('admin.notes')</label>
                            <label class="custom-file-container__custom-file">
                                <input type="file" name="attachment_file[]" class="form-control" multiple />
                            </label>
                        </div>
                    </div>
                    <div id="loader" class="spinner-border text-warning d-none" role="status">
                        <span class="visually-hidden"></span>
                      </div>
                    <button id="btnSubmit" type="submit" class="btn btn-primary mt-2 mb-2 btn-block">@lang('admin.add_new_attach')</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('ajax')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script>
$(document).ready(function() {
    setInterval(function() {
        $('.deleteRecord').on('click', function() {
            const dataid = $(this).attr('data-id');
            swal({
                title: 'هل أنت متأكد?',
                text: 'لن تتمكن من استرداد العنصر!',
                icon: 'warning',
                closeModal: false,
                allowOutsideClick: false,
                closeOnConfirm: false,
                closeOnCancel: false,
                buttons: ['لا', 'نعم']
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: `{{ url('dashborad/attachments/${dataid}') }}`,
                        method: 'DELETE',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            dataid: dataid
                        },
                        success: function(result) {
                            //console.log(result);
                            swal(result.success, {
                                icon: "success",
                            });
                           
                            $('#' + result.id).remove();
                            swal(result.id);
                        }
                    });
                } else {
                    swal("لم يتم حذف العنصر.");
                }
            });
        });
    }, 1000);
    setInterval(function() {
        $('.add_attach').on('click', function() {
            const order_id_new = $(this).attr("data-id");
            $("#order_id1").val(order_id_new);
        });
    }, 1000);

    $('#form_attach').on('submit', function(e) {
        e.preventDefault();
        $("#btnSubmit").attr("disabled", true);
        var formData = new FormData(this);
        var opError = " ";
        $.ajax({
            url: `{{ url('dashborad/orders') }}`,
            type: 'POST',
            data: formData,
            beforeSend: function () {
                $('#loader').removeClass('d-none')
            },
            success: function(result) {
                //console.log(result);
                $("#btnSubmit").attr("disabled", false);
                $('#loginModal1').modal('hide');
                $("#form_attach")[0].reset();
                $('.alterErrorletter').html(" ");
                swal(result.success, {
                    icon: "success",
                });
                location.reload();
            },
            cache: false,
            contentType: false,
            processData: false,
            error: function(errorsub) {
                $("#btnSubmit").attr("disabled", false);
                if (errorsub) {
                    if (errorsub.responseJSON.errors.name_attach) {
                        opError += '<div class="alert alert-danger">' +
                            errorsub.responseJSON.errors
                            .name_attach + '</div>';
                    } else if (errorsub.responseJSON.errors
                        .attachment_file) {
                        opError += '<div class="alert alert-danger">' +
                            errorsub.responseJSON.errors
                            .attachment_file + '</div>';
                    }else if (errorsub.responseJSON.errors
                        .description) {
                        opError += '<div class="alert alert-danger">' +
                            errorsub.responseJSON.errors
                            .description + '</div>';
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