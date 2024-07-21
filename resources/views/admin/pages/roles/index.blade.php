@extends('admin.master')


@section('title', __('admin.add_new_role'))

@section('page-title', __('admin.add_new_role'))

@section('content')

<div class="row" id="cancel-row">
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area br-6">
@can('role-create')
<a href="{{route('admin.roles.create')}}" class="btn btn-primary">
    @lang('admin.add_new_role')
</a>
@endcan
@if($roles->isNotEmpty())
<div class="table-responsive pt-4 pb-4">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">@lang('admin.name')</th>
                <th scope="col">@lang('admin.action')</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $key => $role)
                <tr id="{{$role->id}}">
                    <th scope="row" class="align-middle">{{$loop->iteration}}</th>
                    <td class="align-middle">{{$role->name}}</td>
                    <td class="align-middle">
                    <div class="d-flex align-items-center">
                       @can('role-edit')
                       <a href="{{ route('admin.roles.edit', $role->id) }}"
                        class="btn btn-info mx-2">@lang('admin.edit')</a>
                        @endcan
                        @can('role-delete')
                        <button class="btn btn-danger deleteRecord title_action ms-2" data-title="delete" data-id="{{ $role->id }}">@lang('admin.delete')</button>
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
        {{ $roles->links('general-components.admin.paginate') }}
    </div>
</div>
</div>
</div>
</div>
@endif
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
                        url: `{{ url('dashborad/roles/${dataid}') }}`,
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