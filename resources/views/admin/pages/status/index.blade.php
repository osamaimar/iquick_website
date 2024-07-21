@extends('admin.master')


@section('title', __("admin.status"))

@section('page-title', __("admin.status"))

@section('content')
    <div class="row" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                @can('status-create')
                <div class="d-flex align-items-center justify-content-between">
                    <a href="{{ route('admin.status.create') }}" class="btn btn-primary">@lang('admin.add_status')</a>
                </div>
                @endcan
                <div class="table-responsive mb-4 mt-4">
                    <table id="zero-config" class="table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('admin.name')</th>
                                <th>@lang('admin.color')</th>
                                <th>@lang('admin.status')</th>
                                <th class="no-content">@lang('admin.action')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($status as $statu)
                                <tr id="{{ $statu->id }}">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $statu->title }}</td>
                                    <td><span class="badge" style="background-color: {{ $statu->color }}">{{ $statu->title }}</span></td>
                                    <td>
                                        @can('status-effective')
                                        <form action="{{ url("dashborad/change/status/status/$statu->id") }}" method="post">
                                            @csrf
                                            @method("put")
                                            <input  type="hidden"  name="status"
                                                value="@if ($statu->status == '0')
                                                1
                                                @else
                                                0
                                                @endif"
                                            />
                                            <button type="submit" class="btn @if ($statu->status == '0') btn-warning @else btn-secondary @endif">
                                                @if ($statu->status == '0')
                                                @lang('admin.not_efficient')
                                                @else
                                                @lang('admin.efficient')
                                                @endif
                                            </button>
                                        </form>
                                        @endcan
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                           @can('status-edit')
                                           <a href="{{ route('admin.status.edit', $statu->id) }}"
                                            class="btn btn-info mx-2">@lang('admin.edit')</a>
                                           @endcan
                                            @can('status-delete')
                                            <button class="btn btn-danger deleteRecord mx-2"
                                            data-id="{{ $statu->id }}">@lang('admin.delete')</button>
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
                        {{ $status->links('general-components.admin.paginate') }}
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
                        url: `{{ url('dashborad/status/${dataid}') }}`,
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
    </script>
@endsection
