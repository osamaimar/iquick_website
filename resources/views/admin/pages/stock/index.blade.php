@extends('admin.master')


@section('title', __('admin.order_stocks'))

@section('page-title', __('admin.order_stocks'))

@section('content')
<div class="row" id="cancel-row">
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area br-6">
            <div class="table-responsive mb-4 mt-4">
                <table id="zero-config" class="table table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>@lang('admin.name')</th>
                            <th>@lang('admin.description')</th>
                            <th>@lang('admin.attachments')</th>
                            <th>@lang('admin.total_price')</th>
                            <th>@lang('admin.type_order')</th>
                            <th>@lang('admin.order')</th>
                            <th>@lang('admin.services')</th>
                            <th>@lang('admin.profiles')</th>
                            <th>@lang('admin.status')</th>
                            <th>@lang('admin.attachments')</th>
                            <th class="no-content">@lang('admin.action')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($stocks as $stock)
                        <tr id="{{ $stock->id }}">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $stock->order->name }}</td>
                            <td><?php echo Str::limit($stock->description,30); ?></td>
                            <td>
                                @if ($stock->file!=null)
                                <div class="d-flex align-items-center">
                                    @if(in_array(explode(".",$stock->file)[1],['png','jpg','webp']))
                                    <a href="{{ route('admin.download', $stock->file) }}"><img
                                            style="width: 35px;height: 35px;"
                                            src="{{ asset('assets/images/download/Download-Icon.png') }}" /></a>
                                    @else
                                    <a href="{{ route('admin.download', $stock->file) }}"><img
                                            style="width: 35px;height: 35px;"
                                            src="{{ asset('assets/images/download/Download-Icon.png') }}" /></a>
                                    @endif
                                </div>
                                @endif
                            </td>
                            <td>{{ $stock->order->total_price }} $</td>
                            <td>
                                @if ($stock->order->type_order == 'service')
                                @lang('admin.services')
                                @else
                                @lang('admin.packages')
                                @endif
                            </td>
                            <td>
                                @if ($stock->order->type_order == 'service')
                                {{ $stock->order->service->name }}
                                @else
                                {{ $stock->order->package->name }}
                                @endif
                            </td>
                            <td>
                                {{ $stock->service->name }}
                            </td>
                            <td>
                                {{ $stock->order->profile->name }}
                            </td>
                            <td class="text-center">
                                @if ($stock->order->status == 'done')
                                <a href="#!"><span class="badge outline-badge-secondary shadow-none "
                                        data-id="{{ $stock->order->id }}" data-toggle="modal"
                                        data-target="#loginModal">@lang('admin.done')</span></a>
                                @elseif($stock->order->status == 'canceled')
                                <a href="#!"><span class="badge outline-badge-danger shadow-none "
                                        data-id="{{ $stock->order->id }}" data-toggle="modal"
                                        data-target="#loginModal">@lang('admin.canceled')</span></a>
                                @elseif($stock->order->status == 'pending')
                                <a href="#!"><span class="badge outline-badge-primary shadow-none "
                                        data-id="{{ $stock->order->id }}" data-toggle="modal"
                                        data-target="#loginModal">@lang('admin.pending')</span></a>
                                @elseif($stock->order->status == 'successful')
                                <a href="#!"><span class="badge outline-badge-success shadow-none "
                                        data-id="{{ $stock->order->id }}" data-toggle="modal"
                                        data-target="#loginModal">@lang('admin.successful')</span></a>
                                @endif
                            </td>
                            <td class="text-center">
                                @can('order-list')
                                <a href="{{ route('admin.orders.show', $stock->order->id) }}"
                                    class="btn btn-info mx-2">@lang('admin.attachments')</a>
                                @endcan
                            </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        @can('stock-delete')
                                        <button class="btn btn-danger deleteRecord mx-2"
                                        data-id="{{ $stock->id }}">@lang('admin.delete')</button>
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
                    {{ $stocks->links('general-components.admin.paginate') }}
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
                url: `{{ url('dashborad/stocks/${dataid}') }}`,
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