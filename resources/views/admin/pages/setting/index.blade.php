@extends('admin.master')


@section('title', __("admin.settings"))

@section('page-title', __("admin.settings"))

@section('content')
    <div class="row" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                @if($setting != null)
                <div class="table-responsive mb-4 mt-4" id="{{ $setting->id }}">
                    <table id="zero-config" class="table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>@lang('admin.name')</th>
                                <th class="no-content">@lang('admin.action')</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td>{{ $setting->name }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="{{ route('admin.settings.edit', $setting->id) }}"
                                                class="btn btn-info mx-2">@lang('admin.edit')</a>
                                            <button class="btn btn-danger deleteRecord mx-2"
                                                data-id="{{ $setting->id }}">@lang('admin.delete')</button>
                                        </div>
                                    </td>
                                </tr>
                        </tbody>
                    </table>
                </div>
                @endif
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
                        url: `{{ url('dashborad/settings/${dataid}') }}`,
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
    </script>
@endsection
