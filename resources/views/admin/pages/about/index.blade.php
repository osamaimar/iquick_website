@extends('admin.master')


@section('title', __("admin.abouts"))

@section('page-title', __("admin.abouts"))

@section('content')
    <div class="row" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="d-flex align-items-center justify-content-between">
                @can('about-create')
                    @if($about == null)
                        <a href="{{ route('admin.abouts.create') }}" class="btn btn-primary">@lang('admin.add_new_about')</a>
                    @endif
                @endcan
                </div>
                @if($about != null)
                <div class="table-responsive mb-4 mt-4" id="{{ $about->id }}">
                    <table id="zero-config" class="table table-hover" style="width:100%;">
                        <thead>
                            <tr>
                                <th>@lang('admin.name')</th>
                                <th class="no-content">@lang('admin.action')</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td>{{ $about->title }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="{{ route('admin.abouts.edit', $about->id) }}"
                                                class="btn btn-info mx-2">@lang('admin.edit')</a>
                                            <button class="btn btn-danger deleteRecord mx-2"
                                                data-id="{{ $about->id }}">@lang('admin.delete')</button>
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
                        url: `{{ url('dashborad/abouts/${dataid}') }}`,
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
