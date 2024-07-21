@extends('admin.master')


@section('title', __('admin.profiles'))

@section('page-title', __('admin.profiles'))

@section('content')
    <div class="row" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                @can('profile-list')
                <div class="d-flex align-items-center justify-content-between">
                    <a href="{{ route('admin.profiles.show', $user_id) }}" class="btn btn-primary">@lang('admin.add_new_profile')</a>
                </div>
                @endcan
                <div class="table-responsive mb-4 mt-4">
                    <table id="zero-config" class="table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('admin.code')</th>
                                <th>@lang('admin.name')</th>
                                <th>@lang('user.link')</th>
                                <th>@lang('admin.attachments')</th>
                                <th>@lang('admin.orders')</th>
                                <th class="no-content">@lang('admin.add_attach')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($profile as $profil)
                                <tr id="{{ $profil->id }}">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $profil->code }}</td>
                                    <td>{{ $profil->name }}</td>
                                    <td><a href="{{ $profil->link }}" target="_blank">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
                                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                            </svg>
                                        </a>
                                    </td>
                                    <td>
                                        @can('download-file')
                                        @if ($profil->file != null)
                                            @if(in_array(explode(".",$profil->file)[1],['png','jpg','webp','jpeg']))
                                               <a href="{{ route('admin.download', $profil->file) }}"><img
                                                style="width: 35px;height: 35px;"
                                                src="{{ asset('storage/images/profiles/'.$profil->file) }}" /></a>
                                            @else
                                            <div class="d-flex align-items-center">
                                                <a href="{{ route('admin.download', $profil->file) }}"><img
                                                        style="width: 35px;height: 35px;"
                                                        src="{{ asset('assets/images/download/Download-Icon.png') }}" /></a>
                                            </div>
                                            @endif
                                        @endif
                                        @endcan
                                    </td>
                                    <td>
                                        @can('profile-getorderUser')
                                        <a href="{{route("admin.get/order/profile",$profil->id)}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-dollar-sign">
                                                <line x1="12" y1="1" x2="12" y2="23"></line>
                                                <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                                            </svg>
                                        </a>
                                        @endcan
                                    </td>
                                    <td>
                                        @can('profile-storeAttach')
                                        <a class="add_attach" data-id="{{ $profil->id }}" href="#!"
                                            data-toggle="modal" data-target="#loginModal1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-file-plus">
                                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                                <polyline points="14 2 14 8 20 8"></polyline>
                                                <line x1="12" y1="18" x2="12" y2="12"></line>
                                                <line x1="9" y1="15" x2="15" y2="15"></line>
                                            </svg>
                                        </a>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row pb-4 pt-2">
                    <div class="col-12">
                        {{ $profile->links('general-components.admin.paginate') }}
                    </div>
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
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-x">
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
                            <input type="text" name="name_attach" value="{{ old('name_attach') }}"
                                class="form-control" placeholder=@lang('admin.name_attach')>
                        </div>
                        <div class="col-12 mb-4">
                            <div class="custom-file-container" data-upload-id="myFirstImage">
                                <label><a href="javascript:void(0)" class="custom-file-container__image-clear"
                                        title="Clear Image">x</a> @lang('admin.notes')</label>
                                <label class="custom-file-container__custom-file">
                                    <input type="file" name="attachment_file"
                                    class="form-control">
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
                    url: `{{ url('dashborad/store/attach/profile') }}`,
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
