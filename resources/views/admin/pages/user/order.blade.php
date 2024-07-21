@extends('admin.master')


@section('title', __('admin.orders'))

@section('page-title', __('admin.orders'))

@section('content')

<div class="row" id="cancel-row">
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area br-6">
            @if ($order != null)
            <div class="table-responsive mb-4 mt-4">
                <table id="zero-config" class="table table-hover table-bordered mb-4" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>@lang('admin.code')</th>
                            <th>@lang('admin.name')</th>
                            <th>@lang('admin.total_price')</th>
                            <th>@lang('admin.type_order')</th>
                            <th>@lang('admin.order')</th>
                            <th>@lang('admin.profiles')</th>
                            <th>@lang('admin.status')</th>
                            <th>@lang('user.rating')</th>
                            <th>@lang('admin.attachments')</th>
                            <th class="no-content">@lang('admin.action')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order as $orde)
                        <tr id="{{ $orde->id }}">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $orde->code }}</td>
                            <td><a href="{{ route('admin.profile/history', $orde->user->id) }}">{{ $orde->user->firstname.' '.$orde->user->lastname }}</a></td>
                            <td>{{ $orde->total_price }} $</td>
                            <td>
                                @if ($orde->type_order == 'service')
                                @lang('admin.services')
                                @else
                                @lang('admin.packages')
                                @endif
                            </td>
                            <td>
                                @if ($orde->type_order == 'service')
                                {{ $orde->service->name }}
                                @else
                                {{$orde->package->name}}
                                @endif
                            </td>
                            <td>
                                {{ $orde->profile->name }}
                            </td>
                            <td class="text-center">
                                @if ($orde->status == 'done')
                                <a href="#!"><span class="badge outline-badge-secondary shadow-none edit_order_status"
                                        data-id="{{ $orde->id }}" data-toggle="modal"
                                        data-target="#loginModal">@lang('admin.done')</span></a>
                                @elseif($orde->status == 'canceled')
                                <a href="#!"><span class="badge outline-badge-danger shadow-none edit_order_status"
                                        data-id="{{ $orde->id }}" data-toggle="modal"
                                        data-target="#loginModal">@lang('admin.canceled')</span></a>
                                @elseif($orde->status == 'pending')
                                <a href="#!"><span class="badge outline-badge-primary shadow-none edit_order_status"
                                        data-id="{{ $orde->id }}" data-toggle="modal"
                                        data-target="#loginModal">@lang('admin.pending')</span></a>
                                @elseif($orde->status == 'successful')
                                <a href="#!"><span class="badge outline-badge-success shadow-none edit_order_status"
                                        data-id="{{ $orde->id }}" data-toggle="modal"
                                        data-target="#loginModal">@lang('admin.successful')</span></a>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex justify-content-between align-items-center">
                                    @if ($orde->status == 'done')
                                    @if ($orde->rating != null)
                                    <div style="font-size: 18px;"><i class="fa-solid fa-star"
                                            style="color:#fce708;"></i>
                                        {{ $orde->rating }}</div>
                                    @endif
                                    @endif
                                </div>
                            </td>
                            <td class="text-center">
                                @can("order-show")
                                <a href="{{ route('admin.orders.show', $orde->id) }}"
                                    class="btn btn-info mx-2">@lang('admin.attachments')</a>
                                @endcan
                            </td>
                            <td class="text-center">
                                <div class="dropdown custom-dropdown">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink7"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <h1>...</h1>
                                    </a>
                                    <div class="dropdown-menu solve_menu_problem" aria-labelledby="dropdownMenuLink7">
                                        @can('order-export')
                                        <a class="dropdown-item"
                                        href="{{ route('admin.export', $orde->id) }}">@lang('admin.download')</a>
                                        @endcan
                                        @can('order-create')
                                        <a class="dropdown-item add_attach" href="#!" data-id="{{ $orde->id }}"
                                            href="#!" data-toggle="modal"
                                            data-target="#loginModal1">@lang('admin.add_attach')</a>
                                        @endcan
                                        @can('assignedtask-create')
                                        <a class="dropdown-item add_task" data-id="{{ $orde->id }}" href="#!"
                                            data-toggle="modal" data-target="#loginModal3">@lang('admin.add_task')</a>
                                        @endcan
                                        @can('packageArchive-create')
                                        @if ($orde->type_order == 'package')
                                        <a class="dropdown-item done_service" data-id="{{ $orde->package->id }}"
                                            data-order="{{ $orde->id }}" href="#!" data-toggle="modal"
                                            data-target="#loginModal4">@lang('admin.done_service')</a>
                                        @endif
                                        @endcan
                                        @can('order-edit')
                                        <a class="dropdown-item edit_order_status" data-id="{{ $orde->id }}" href="#!"
                                            data-toggle="modal" data-target="#loginModal">@lang('admin.edit_status')</a>
                                        @endcan
                                        @can('order-delete')
                                        <a class="dropdown-item deleteRecord" href="#!"
                                        data-id="{{ $orde->id }}">@lang('admin.delete')</a>
                                        @endcan
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="row pb-4 pt-2">
                <div class="col-12">
                    {{ $order->links('general-components.admin.paginate') }}
                </div>
            </div>
            @endif
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
                    <button id="btnSubmit2" type="submit"
                        class="btn btn-primary mt-2 mb-2 btn-block">@lang('admin.edit')</button>
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
                    <button id="btnSubmit" type="submit"
                        class="btn btn-primary mt-2 mb-2 btn-block">@lang('admin.edit')</button>
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
                        <textarea type="text" name="description" value="{{ old('description') }}" class="form-control"
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
            swal(dataid);
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
    setInterval(function() {
        $('.edit_order_status').on('click', function() {
            const order_id_new = $(this).attr("data-id");
            $("#order_id_status").val(order_id_new);
        });
    }, 1000);

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
            success: function(result) {
                //console.log(result);
                $("#btnSubmit").attr("disabled", false);
                $('#loginModal').modal('hide');
                $("#form_status")[0].reset();
                swal(result.success, {
                    icon: "success",
                });
                location.reload();
            }
        });
    });

    setInterval(function() {
        $('.add_attach').on('click', function() {
            const order_id_new = $(this).attr("data-id");
            $("#order_id1").val(order_id_new);
        });
    }, 1000);

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
                        $('#loader').removeClass('d-none')
                    },
            success: function(result) {
                //console.log(result);
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
                $('#loader').addClass('d-none')
            },
        });
    });
    setInterval(function() {
        $('.add_task').on('click', function() {
            const order_id_new = $(this).attr("data-id");
            $("#assigned_task_id1").val(order_id_new);
        });
    }, 1000);

    $('#form_tasks').on('submit', function(e) {
        e.preventDefault();
        $("#btnSubmit2").attr("disabled", true);
        var formData = new FormData(this);
        var opError = " ";
        $.ajax({
            url: `{{ url('dashborad/assignedtasks') }}`,
            type: 'POST',
            data: formData,
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
                function resetStartTime() {
                startTime = new Date();
                window.localStorage.setItem('startTime', startTime);
                return startTime;
                }
                resetStartTime();
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
            }
        });
    });
    setInterval(function() {
        $('.done_service').on('click', function() {
            const package_new_id = $(this).attr("data-id");
            const order_id_new = $(this).attr("data-order");
            $("#get_package_id").val(package_new_id);
            $("#get_order_id").val(order_id_new);
        });
    }, 1000);

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
});
</script>
@endsection