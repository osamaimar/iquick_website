@extends('admin.master')


@section('title', __("admin.sliders"))

@section('page-title', __("admin.sliders"))

@section('content')
    <div class="row" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                @can('slider-create')
                <div class="d-flex align-items-center justify-content-between">
                    <a href="{{ route('admin.sliders.create') }}" class="btn btn-primary">@lang('admin.add_new_slider')</a>
                </div>
                @endcan
                <div class="table-responsive mb-4 mt-4">
                    <table id="zero-config" class="table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('admin.image')</th>
                                <th class="no-content">@lang('admin.action')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sliders as $slide)
                                <tr id="{{ $slide->id }}">
                                    <td>{{ $loop->iteration }}</td>
                                    <td><img style="    width: 50px;
                                        height: 50px;
                                        border-radius: 8px;" src="{{ asset('storage/images/sliders/'.$slide->image) }}" alt="image"></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                           @can('slider-edit')
                                           <a href="{{ route('admin.sliders.edit', $slide->id) }}"
                                            class="btn btn-info mx-2">@lang('admin.edit')</a>
                                           @endcan
                                            @can('slider-delete')
                                            <button class="btn btn-danger deleteRecord mx-2"
                                            data-id="{{ $slide->id }}">@lang('admin.delete')</button>
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
                        {{ $sliders->links('general-components.admin.paginate') }}
                    </div>
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
                        url: `{{ url('dashborad/sliders/${dataid}') }}`,
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
