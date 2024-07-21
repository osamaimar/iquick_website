@extends('admin.master')


@section('title', __('admin.users'))

@section('page-title', __('admin.users'))

@section('content')
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
                <form class="mt-0" id="form_order" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="alterErrorletter">
                    </div>
                    <div class="col-12 mb-4">
                        <label>@lang('admin.services')</label>
                        <select class="form-control" name="service_id" aria-label="Default select example">
                            <option selected></option>
                            @foreach($service as $servic)
                            <option value="{{$servic->id}}">{{$servic->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 mb-4">
                        <label>@lang('admin.packages')</label>
                        <select class="form-control" name="package_id" aria-label="Default select example">
                            <option selected></option>
                            @foreach($package as $packag)
                            <option value="{{$packag->id}}">{{$packag->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 mb-4">
                        <label>@lang('admin.profiles')</label>
                        <select class="form-control" name="profile_id" aria-label="Default select example">
                            
                        </select>
                    </div>
                    <input type="hidden" name="user_id" id="user_id1" />
                    {{-- <div class="col-12 mb-4">
                        <label>@lang('admin.description')</label>
                        <textarea type="text" name="description_cust"
                            class="form-control">{{ old('description_cust') }}</textarea>
                    </div> --}}
                    <div class="col-12 mb-4">
                        <div class="custom-file-container" data-upload-id="myFirstImage">
                            <label><a href="javascript:void(0)" class="custom-file-container__image-clear"
                                    title="Clear Image">x</a> @lang('admin.notes')</label>
                            <label class="custom-file-container__custom-file">
                                <input type="file" name="file" class="form-control form-control-sm">
                            </label>
                        </div>
                    </div>
                    <div id="loader" class="spinner-border text-warning d-none" role="status">
                        <span class="visually-hidden"></span>
                      </div>
                    <button id="btnSubmit2" type="submit"
                        class="btn btn-primary mt-2 mb-2 btn-block">@lang('admin.order_now')</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal 1-->
{{-- <div class="modal fade login-modal" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header" id="loginModalLabel">
                <h4 class="modal-title">@lang('admin.edit_status')</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><svg aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg></button>
            </div>
            <div class="modal-body">
                <form class="mt-0" id="form_status" method="post">
                    <div class="form-group">
                        <input type="hidden" id="order_id_status" />
                        <select class="form-control" id="status" aria-label="Default select example">
                            <option value="0">@lang('admin.not_active')</option>
                            <option value="1">@lang('admin.active')</option>
                        </select>
                    </div>
                    <button id="btnSubmit" type="submit"
                        class="btn btn-primary mt-2 mb-2 btn-block">@lang('admin.edit')</button>
                </form>
            </div>
        </div>
    </div>
</div> --}}
@livewire('admin.search-user')
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
                        url: `{{ url('dashborad/users/${dataid}') }}`,
                        method: 'DELETE',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            dataid: dataid
                        },
                        success: function(result) {
                            //console.log(result);
                            swal(result.success, {
                                icon: result.icon,
                            });
                            $('#' + result.id).remove();
                        }
                    });
                } else {
                    swal("لم يتم حذف العنصر.");
                }
            });
        });
    }, 1000);
    // setInterval(function() {
    //     $('.edit_order_status').on('click', function() {
    //         const order_id_new = $(this).attr("data-id");
    //         $("#order_id_status").val(order_id_new);
    //     });
    // }, 1000);

    // $('#form_status').on('submit', function(e) {
    //     e.preventDefault();
    //     $("#btnSubmit").attr("disabled", true);
    //     const order_id = $('#order_id_status').val();
    //     const status = $('#status').val();
    //     $.ajax({
    //         url: `{{ url('dashborad/change/status/user/${order_id}') }}`,
    //         type: "put",
    //         data: {
    //             "_token": "{{ csrf_token() }}",
    //             order_id: order_id,
    //             status: status,
    //         },
    //         success: function(result) {
    //             //console.log(result);
    //             $("#btnSubmit").attr("disabled", false);
    //             $('#loginModal').modal('hide');
    //             $("#form_status")[0].reset();
    //             swal(result.success, {
    //                 icon: "success",
    //             });
    //             location.reload();
    //         }
    //     });
    // });
    setInterval(function() {
        $('.add_order').on('click', function() {
            const order_id_new = $(this).attr("data-id");
            $("#user_id1").val(order_id_new);
            $("#form_order")[0].reset();
        });
    }, 1000);

    $('#form_order').on('submit', function(e) {
        e.preventDefault();
        $('#btnSubmit2').attr("disabled", true);
        var formData = new FormData(this);
        var opError = " ";
        $.ajax({
            url: `{{ url('dashborad/order/to/user') }}`,
            type: 'POST',
            data: formData,
            beforeSend: function () {
                        $('#loader').removeClass('d-none')
                    },
            success: function(result) {
                //console.log(result);
                $('#btnSubmit2').attr("disabled", false);
                $("#form_order")[0].reset();
                $('.alterErrorletter').html(" ");
                $('#loginModal3').modal('hide');
                swal(result.success, {
                    icon: "success",
                });
                location.reload();
            },
            cache: false,
            contentType: false,
            processData: false,
            error: function(errorsub) {
                $('#btnSubmit2').attr("disabled", false);
                if (errorsub) {
                    if (errorsub.responseJSON.errors.description_cust) {
                        opError += '<div class="alert alert-danger">' +
                            errorsub.responseJSON.errors
                            .description_cust + '</div>';
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
    $('select[name="service_id"],select[name="package_id"]').on('click', function() {
                var client = $('#user_id1').val();
                if (client) {
                    $.ajax({
                        url: `{{ url('dashborad/getProfile/${client}') }}`,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="profile_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="profile_id"]').append('<option value="' +
                                    value['id'] + '">' + value['name'] + '</option>'
                                );
                            });
                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });
});
</script>
@endsection