@extends('admin.master')


@section('title', __('admin.contacts'))

@section('page-title', __('admin.contacts'))

@section('content')
<div class="row" id="cancel-row">
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area br-6">
            @can('emailTo-create')
            <a href="#!"><span class="badge outline-badge-primary shadow-none send_mail" data-toggle="modal"
                data-target="#loginModal2">@lang('admin.send_mail')</span></a>
            @endcan
            <div class="table-responsive mb-4 mt-4">
                <table id="zero-config" class="table table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>@lang('admin.name')</th>
                            <th>@lang('admin.email')</th>
                            <th>@lang('admin.phone')</th>
                            <th>@lang('admin.messages')</th>
                            <th>@lang('admin.reply')</th>
                            <th class="no-content">@lang('admin.action')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contact as $contac)
                        <tr id="{{ $contac->id }}">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $contac->name }}</td>
                            <td>{{ $contac->email }}</td>
                            <td>{{ $contac->phone }}</td>
                            <td><?php echo Str::limit($contac->message,30); ?></td>
                            <td>
                                @if ($contac->status == '0')
                                @can('contact-create')
                                <a href="#!"><span class="badge outline-badge-secondary shadow-none add_reply"
                                    data-id="{{ $contac->id }}" data-toggle="modal"
                                    data-target="#loginModal">@lang('admin.not_Reply')</span></a>
                                @endcan
                                @elseif($contac->status == '1')
                                <span class="badge outline-badge-success shadow-none">@lang('admin.have_Reply')</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    @can('contact-delete')
                                    <button class="btn btn-danger deleteRecord mx-2"
                                    data-id="{{ $contac->id }}">@lang('admin.delete')</button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="row pb-4 pt-2">
                <div class="col-12">
                    {{ $contact->links('general-components.admin.paginate') }}
                </div>
            </div>
        </div>
    </div>

</div>
<!-- Modal 1-->
<div class="modal fade login-modal" id="loginModal2" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header" id="loginModalLabel">
                <h4 class="modal-title">@lang('admin.send_mail')</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><svg aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg></button>
            </div>
            <div class="modal-body">
                <form class="mt-0" id="send_mail" method="post">
                    @csrf
                    <div class="alterErrorletter">
                    </div>

                    <div class="col-12 mb-4">
                        <label for="exampleFormControlTextarea1" class="form-label">@lang('admin.email')</label>
                        <select class="form-control" name="email_user" aria-label="Default select example">
                            <option selected></option>
                            @foreach ($contact as $contac)
                              <option value="{{$contac->email}}">{{$contac->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 mb-4">
                        <input type="text" name="email" value="{{ old('email') }}" class="form-control"
                            placeholder="{{__('admin.email')}}">
                    </div>
                    <div class="col-12 mb-4">
                        <textarea id="mytextarea" type="text" name="message" class="form-control"
                            placeholder=@lang('admin.description')>{{ old('message') }}</textarea>
                    </div>
                    <div class="col-12 mb-4">
                        <div class="custom-file-container" data-upload-id="myFirstImage">
                            <label><a href="javascript:void(0)" class="custom-file-container__image-clear"
                                    title="Clear Image">x</a> @lang('admin.notes')</label>
                            <label class="custom-file-container__custom-file">
                                <input type="file" name="attachment_file" class="form-control">
                            </label>
                        </div>
                    </div>
                    <div id="loader" class="spinner-border text-warning d-none" role="status">
                        <span class="visually-hidden"></span>
                    </div>
                    <button id="btnSubmit2" type="submit"
                        class="btn btn-primary mt-2 mb-2 btn-block">@lang('admin.send_mail')</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal 1-->
<div class="modal fade login-modal" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header" id="loginModalLabel">
                <h4 class="modal-title">@lang('admin.add_reply')</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><svg aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg></button>
            </div>
            <div class="modal-body">
                <form class="mt-0" id="form_reply" method="post">
                    @csrf
                    <div class="alterErrorletter">
                    </div>

                    <div class="col-12 mb-4">
                        <input type="hidden" name="contact_id" id="contact_id1" />
                        <textarea id="mytextarea" type="text" name="reply_text" class="form-control"
                            placeholder=@lang('admin.description')>{{ old('reply_text') }}</textarea>
                    </div>
                    <div class="col-12 mb-4">
                        <div class="custom-file-container" data-upload-id="myFirstImage">
                            <label><a href="javascript:void(0)" class="custom-file-container__image-clear"
                                    title="Clear Image">x</a> @lang('admin.notes')</label>
                            <label class="custom-file-container__custom-file">
                                <input type="file" name="attachment_file" class="form-control">
                            </label>
                        </div>
                    </div>
                    <div id="loader1" class="spinner-border text-warning d-none" role="status">
                        <span class="visually-hidden"></span>
                    </div>
                    <button id="btnSubmit" type="submit"
                        class="btn btn-primary mt-2 mb-2 btn-block">@lang('admin.add_reply')</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('ajax')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script>
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
                url: `{{ url('dashborad/contacts/${dataid}') }}`,
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
$(document).ready(function() {

    $('.add_reply').on('click', function() {
        const order_id_new = $(this).attr("data-id");
        $("#contact_id1").val(order_id_new);
    });

    $('#form_reply').on('submit', function(e) {
        e.preventDefault();
        $("#btnSubmit").attr("disabled", true);
        var formData = new FormData(this);
        var opError = " ";
        $.ajax({
            url: `{{ url('dashborad/contacts') }}`,
            type: 'POST',
            data: formData,
            beforeSend: function () {
                $('#loader1').removeClass('d-none')
            },
            success: function(result) {
                //console.log(result);
                $("#btnSubmit").attr("disabled", false);
                $('#loginModal').modal('hide');
                $("#form_reply")[0].reset();
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
                    if (errorsub.responseJSON.errors.reply_text) {
                        opError += '<div class="alert alert-danger">' +
                            errorsub.responseJSON.errors
                            .reply_text + '</div>';
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

    $('#send_mail').on('submit', function(e) {
        e.preventDefault();
        $("#btnSubmit2").attr("disabled", true);
        var formData = new FormData(this);
        var opError = " ";
        $.ajax({
            url: `{{ url('dashborad/email/to') }}`,
            type: 'POST',
            data: formData,
            beforeSend: function () {
                $('#loader').removeClass('d-none')
            },
            success: function(result) {
                //console.log(result);
                $("#btnSubmit2").attr("disabled", false);
                $('#loginModal2').modal('hide');
                $("#send_mail")[0].reset();
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
                    if (errorsub.responseJSON.errors.email) {
                        opError += '<div class="alert alert-danger">' +
                            errorsub.responseJSON.errors
                            .email + '</div>';
                    }else if(errorsub.responseJSON.errors.message) {
                        opError += '<div class="alert alert-danger">' +
                            errorsub.responseJSON.errors
                            .message + '</div>';
                    }else if(errorsub.responseJSON.errors.attachment_file) {
                        opError += '<div class="alert alert-danger">' +
                            errorsub.responseJSON.errors
                            .attachment_file + '</div>';
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