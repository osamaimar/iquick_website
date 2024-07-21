@extends('admin.master')


@section('title', __('admin.orders'))

@section('page-title', __('admin.orders'))

@section('content')

@livewire('admin.search')
<!-- Modal 2-->
<div class="modal fade login-modal" id="loginModal10" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel1"
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
                    <div id="loader1" class="spinner-border text-warning d-none" role="status">
                        <span class="visually-hidden"></span>
                      </div>
                    <button id="btnSubmit10" type="submit"
                        class="btn btn-primary mt-2 mb-2 btn-block">@lang('admin.order_now')</button>
                </form>
            </div>
        </div>
    </div>
</div> 
<!-- Modal 1-->
<div class="modal fade login-modal" id="loginModal4" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header" id="loginModalLabel">
                <h4 class="modal-title">@lang('admin.done_service')</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><svg aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg></button>
            </div>
            <div class="modal-body">
                <a id="#!" class="btn btn-secondary mt-2 mb-2 btn-block view_service">@lang('admin.view_service')</a>
                <form class="mt-0" id="form_service" method="post">
                    @csrf
                    <input type="hidden" name="package_id" id="get_package_id" />
                    <input type="hidden" name="order_id" id="get_order_id" />
                    <div class="row" id="tobody">
                        
                    </div>
                    <button id="btnSubmit4" type="submit" class="btn btn-primary mt-2 mb-2 btn-block"
                        style="display:none">@lang('admin.save')</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal 1-->
<div class="modal fade login-modal" id="loginModal3" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header" id="loginModalLabel">
                <h4 class="modal-title">@lang('admin.assigned_task')</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><svg aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg></button>
            </div>
            <div class="modal-body">
                <form class="mt-0" id="form_tasks" method="post">
                    @csrf
                    <div class="alterErrorletter">
                    </div>
                    <div class="col-12 mb-4">
                        <input type="hidden" name="assigned_task_id" id="assigned_task_id1" />
                        <select class="form-control" name="user_id" aria-label="Default select example">
                            @foreach ($user as $use)
                            <option value="{{ $use->id }}">{{ $use->firstname . ' ' . $use->lastname }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 mb-4">
                        <textarea id="mytextarea" type="text" name="notes" class="form-control"
                            placeholder=@lang('admin.description')>{{ old('name_attach') }}</textarea>
                    </div>
                    <div id="loader2" class="spinner-border text-warning d-none" role="status">
                        <span class="visually-hidden"></span>
                      </div>
                    <button id="btnSubmit2" type="submit"
                        class="btn btn-primary mt-2 mb-2 btn-block">@lang('admin.add_task')</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal 1-->
<div class="modal fade login-modal" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
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
                            <option value="done">@lang('admin.done')</option>
                            <option value="pending">@lang('admin.pending')</option>
                            <option value="canceled">@lang('admin.canceled')</option>
                            <option value="successful">@lang('admin.successful')</option>
                        </select>
                    </div>
                    <div id="loader3" class="spinner-border text-warning d-none" role="status">
                        <span class="visually-hidden"></span>
                      </div>
                    <button id="btnSubmit" type="submit"
                        class="btn btn-primary mt-2 mb-2 btn-block">@lang('admin.edit')</button>
                </form>
            </div>
        </div>
    </div>
</div>
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
                        <textarea type="text" name="description" rows="8" value="{{ old('description') }}" class="form-control"
                            placeholder="{{__('admin.description')}}"></textarea>
                    </div>
                    <div class="col-12 mb-4">
                        <div class="custom-file-container" data-upload-id="myFirstImage">
                            <label><a href="javascript:void(0)" class="custom-file-container__image-clear"
                                    title="Clear Image">x</a> @lang('admin.notes')</label>
                            <label class="custom-file-container__custom-file">
                                <input type="file" name="attachment_file[]"
                                    class="form-control" multiple />
                            </label>
                        </div>
                    </div>
                    <div id="loader4" class="spinner-border text-warning d-none" role="status">
                        <span class="visually-hidden"></span>
                    </div>
                    <button id="btnSubmit1" type="submit" class="btn btn-primary mt-2 mb-2 btn-block">@lang('admin.add_new_attach')</button>
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
                        url: `{{ url('dashborad/orders/${dataid}') }}`,
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
                        }
                    });
                } else {
                    swal("لم يتم حذف العنصر.");
                }
            });
        });
    }, 500);
    setInterval(function() {
        $('.edit_order_status').on('click', function() {
            const order_id_new = $(this).attr("data-id");
            $("#order_id_status").val(order_id_new);
        });
    }, 500);

    $('#form_status').on('submit', function(e) {
        e.preventDefault();
        $("#btnSubmit").attr("disabled", true);
        const order_id = $('#order_id_status').val();
        const status = $('#status').val();
        $.ajax({
            url: `{{ url('dashborad/orders/${order_id}') }}`,
            type: "put",
            data: {
                "_token": "{{ csrf_token() }}",
                order_id: order_id,
                status: status,
            },
            beforeSend: function () {
                        $('#loader3').removeClass('d-none')
                    },
            success: function(result) {
                //console.log(result);
                $("#btnSubmit").attr("disabled", false);
                $('#loginModal').modal('hide');
                $("#form_status")[0].reset();
                swal(result.success, {
                    icon: "success",
                });
                location.reload();
            },
            complete: function () {
                $('#loader3').addClass('d-none')
            },
        });
    });

    setInterval(function() {
        $('.add_attach').on('click', function() {
            const order_id_new = $(this).attr("data-id");
            $("#order_id1").val(order_id_new);
        });
    }, 500);

    $('#form_attach').on('submit', function(e) {
        e.preventDefault();
        $("#btnSubmit1").attr("disabled", true);
        var formData = new FormData(this);
        var opError = " ";
        $.ajax({
            url: `{{ url('dashborad/orders') }}`,
            type: 'POST',
            data: formData,
            beforeSend: function () {
                $('#loader4').removeClass('d-none')
            },
            success: function(result) {
                //console.log(result);
                $("#btnSubmit1").attr("disabled", false);
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
                $("#btnSubmit1").attr("disabled", false);
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
                    }
                    else if (errorsub.responseJSON.errors
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
                $('#loader4').addClass('d-none')
            },
        });
    });


    setInterval(function() {
        $('.add_task').on('click', function() {
            const order_id_new = $(this).attr("data-id");
            $("#assigned_task_id1").val(order_id_new);
        });
    }, 500);

    $('#form_tasks').on('submit', function(e) {
        e.preventDefault();
        $("#btnSubmit2").attr("disabled", true);
        var formData = new FormData(this);
        var opError = " ";
        $.ajax({
            url: `{{ url('dashborad/assignedtasks') }}`,
            type: 'POST',
            data: formData,
            beforeSend: function () {
                $('#loader2').removeClass('d-none')
            },
            success: function(result) {
                //console.log(result);
                $("#btnSubmit2").attr("disabled", false);
                $('#loginModal3').modal('hide');
                $("#form_tasks")[0].reset();
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
                $("#btnSubmit2").attr("disabled", false);
                if (errorsub) {
                    if (errorsub.responseJSON.errors.notes) {
                        opError += '<div class="alert alert-danger">' +
                            errorsub.responseJSON.errors
                            .notes + '</div>';
                    } else if (errorsub.responseJSON.errors
                        .user_id) {
                        opError += '<div class="alert alert-danger">' +
                            errorsub.responseJSON.errors
                            .user_id + '</div>';
                    }
                    $('.alterErrorletter').html(" ");
                    $('.alterErrorletter').append(opError);
                }
            },
            complete: function () {
                $('#loader2').addClass('d-none')
            },
        });
    });

});

setInterval(function() {
    $('.done_service').on('click', function() {
        const package_new_id = $(this).attr("data-id");
        const order_id_new = $(this).attr("data-order");
        $("#get_package_id").val(package_new_id);
        $("#get_order_id").val(order_id_new);
    });
}, 500);

$('.view_service').on('click', function() {
    const get_order_id = $("#get_order_id").val();
    $.ajax({
        url: `{{ url('dashborad/get/package/service/${get_order_id}') }}`,
        type: 'get',
        data: {
            get_order_id: get_order_id
        },
        success: function(data) {
            //console.log(result);
            $(".view_service").css("display", 'none');
            $("#btnSubmit4").css("display", 'block');
            $.each(data, function(key, value) {
                $('#tobody').append(`
                        <div class="col-12 col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" name="service_id[]" ${ value['status']=='1' ? 'checked' :''} type="checkbox" value="${value['service_id']}" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    ${value['service_name']}
                                </label>
                            </div>
                        </div>
                        <div class="col-12 col-md-3 mb-2">
                            <div class="form-check">
                                <label>@lang('admin.num_service'): ${value['num_servicetotle']}</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-3 mb-2">
                            <div class="form-check">
                                <label>@lang('admin.num_service_done'): ${value['num_service_done']}</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-2 mb-2">
                            <div class="form-check">
                                <input class="form-control pt-0 pb-0" name="num_service[]"  value="${value['num_service']}"  type="text" placeholder="{{__('admin.num_service')}}">
                            </div>
                        </div>
                        `);
            });
        },
    });
});
$('#form_service').on('submit', function(e) {
    e.preventDefault();
    $("#btnSubmit4").attr("disabled", true);
    var formData = new FormData(this);
    var opError = " ";
    $.ajax({
        url: `{{ url('dashborad/package/archives') }}`,
        type: 'POST',
        data: formData,
        success: function(result) {
            //console.log(result);
            $("#btnSubmit4").attr("disabled", false);
            $('#loginModal3').modal('hide');
            $("#form_service")[0].reset();
            swal(result.success, {
                icon: result.warning,
            });
            location.reload();
        },
        cache: false,
        contentType: false,
        processData: false,
    });
});
setInterval(function() {
        $('.add_order').on('click', function() {
            const order_id_new = $(this).attr("data-id");
            $("#user_id1").val(order_id_new);
            $("#form_order")[0].reset();
        });
    }, 1000);

    $('#form_order').on('submit', function(e) {
        e.preventDefault();
        $('#btnSubmit10').attr("disabled", true);
        var formData = new FormData(this);
        var opError = " ";
        $.ajax({
            url: `{{ url('dashborad/order/to/user') }}`,
            type: 'POST',
            data: formData,
            beforeSend: function () {
                        $('#loader1').removeClass('d-none')
                    },
            success: function(result) {
                //console.log(result);
                $('#btnSubmit10').attr("disabled", false);
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
                $('#btnSubmit10').attr("disabled", false);
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
                $('#loader1').addClass('d-none')
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
</script>
@endsection