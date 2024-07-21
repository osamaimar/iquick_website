@extends('admin.master')


@section('title', __('admin.list_order'))

@section('page-title', __('admin.list_order'))

@section('content')

<div class="row" id="cancel-row">
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area br-6">
            @can('order-listOrderExport')
                   <a href="{{ route('admin.listOrder/export/data') }}" class="btn btn-secondary mb-2 mx-4">@lang('permission.order-listOrderExport')</a>
            @endcan
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
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order as $orde)
                        <tr id="{{ $orde->id }}">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $orde->code }}</td>
                            <td>{{ $orde->user->firstname.' '.$orde->user->lastname }}</td>
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
                                {{ $orde->package->name }}
                                @endif
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
@endsection