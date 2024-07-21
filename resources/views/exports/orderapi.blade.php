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
                    <td>
                         {{ $orde->profile->name }}
                    </td>
                    <td class="text-center">
                        @if ($orde->status == 'done')
                            <span class="badge outline-badge-secondary shadow-none edit_order_status"
                                data-id="{{ $orde->id }}" data-toggle="modal"
                                data-target="#loginModal">@lang('admin.done')</span>
                        @elseif($orde->status == 'canceled')
                            <span class="badge outline-badge-danger shadow-none edit_order_status"
                                data-id="{{ $orde->id }}" data-toggle="modal"
                                data-target="#loginModal">@lang('admin.canceled')</span>
                        @elseif($orde->status == 'pending')
                            <a href="#!"><span
                                    class="badge outline-badge-primary shadow-none edit_order_status"
                                    data-id="{{ $orde->id }}" data-toggle="modal"
                                    data-target="#loginModal">@lang('admin.pending')</span></a>
                        @elseif($orde->status == 'successful')
                            <a href="#!"><span
                                    class="badge outline-badge-success shadow-none edit_order_status"
                                    data-id="{{ $orde->id }}" data-toggle="modal"
                                    data-target="#loginModal">@lang('admin.successful')</span></a>
                        @endif
                    </td>
                    <td>
                        @if ($orde->status == 'done')
                            @if ($orde->rating != null)
                                {{ $orde->rating }}
                            @endif
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>