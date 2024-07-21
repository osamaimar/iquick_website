<div class="row" id="cancel-row">
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area br-6">
            <div class="align-items-center justify-content-between">
                <div class="row g-3">
                    <div class="col-md-3 col-12">
                        <div class="form-outline">
                            <label class="form-label">@lang('admin.start')</label>
                            <input type="text" placeholder="{{ __('admin.start') }}" wire:model="start"
                                value="{{ old('start') }}" class="form-control" />
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="form-outline">
                            <label class="form-label">@lang('admin.end')</label>
                            <input type="text" placeholder="{{ __('admin.end') }}" wire:model="end"
                                value="{{ old('end') }}" class="form-control" />
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="form-outline">
                            <label class="form-label">@lang('admin.status')</label>
                            <select class="form-control" wire:model="status">
                                <option selected></option>
                                <option value="done">@lang('admin.done')</option>
                                <option value="pending">@lang('admin.pending')</option>
                                <option value="canceled">@lang('admin.canceled')</option>
                                <option value="successful">@lang('admin.successful')</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="form-outline">
                            <label class="form-label">@lang('admin.code')</label>
                            <input type="text" placeholder="{{ __('admin.code') }}" wire:model="code"
                                value="{{ old('code') }}" class="form-control" />
                        </div>
                    </div>
                </div>
            </div>
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
                                <th>@lang('admin.profiles')</th>
                                <th>@lang('admin.status')</th>
                                <th>@lang('user.rating')</th>
                                <th>@lang('admin.attachments')</th>
                                <th class="no-content">@lang('admin.action')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order as $orde)
                                <tr id="{{ $orde->id }}">
                                    <td>{{ $loop->iteration }}</td>
                                    <td><a href="{{route("admin.orders.show",$orde->id)}}">{{ $orde->code }}</a></td>
                                    <td><a href="{{ route('admin.profile/history', $orde->user->id) }}">{{ $orde->user->firstname.' '.$orde->user->lastname }}</a></td>
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
                                            {{$orde->package->name}}
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route("admin.profiles.edit",$orde->profile->id)}}"> {{ $orde->profile->name }}</a>
                                    </td>
                                    <td class="text-center">
                                        @if ($orde->status == 'done')
                                            <a href="#!"><span
                                                    class="badge outline-badge-secondary shadow-none edit_order_status"
                                                    data-id="{{ $orde->id }}" data-toggle="modal"
                                                    data-target="#loginModal">@lang('admin.done')</span></a>
                                        @elseif($orde->status == 'canceled')
                                            <a href="#!"><span
                                                    class="badge outline-badge-danger shadow-none edit_order_status"
                                                    data-id="{{ $orde->id }}" data-toggle="modal"
                                                    data-target="#loginModal">@lang('admin.canceled')</span></a>
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
                                        <div class="d-flex justify-content-between align-items-center">
                                            @if ($orde->status == 'done')
                                                @if ($orde->rating != null)
                                                    <div style="font-size: 18px;"><i class="fa-solid fa-star"
                                                            style="color:#fce708;"></i>
                                                        {{ $orde->rating }}</div>
                                                @endif
                                            @endif
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        @can("order-show")
                                        <a href="{{ route('admin.orders.show', $orde->id) }}"
                                            class="btn btn-info mx-2">@lang('admin.attachments')</a>
                                        @endcan
                                    </td>
                                    <td class="text-center">
                                        <div class="dropdown custom-dropdown">
                                            <a class="dropdown-toggle" href="#" role="button"
                                                id="dropdownMenuLink7" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <h1>...</h1>
                                            </a>
                                            <div class="dropdown-menu solve_menu_problem" aria-labelledby="dropdownMenuLink7">
                                                @can('order-export')
                                                    <a class="dropdown-item"
                                                    href="{{ route('admin.export', $orde->id) }}">@lang('admin.download')</a>
                                                @endcan
                                                @can('order-create')
                                                <a class="dropdown-item add_attach" href="#!"
                                                    data-id="{{ $orde->id }}" href="#!" data-toggle="modal"
                                                    data-target="#loginModal1">@lang('admin.add_attach')</a>
                                                    @endcan
                                                @can('assignedtask-create')
                                                <a class="dropdown-item add_task" data-id="{{ $orde->id }}"
                                                    href="#!" data-toggle="modal"
                                                    data-target="#loginModal3">@lang('admin.add_task')</a>
                                                    @endcan
                                                @can('packageArchive-create')
                                                @if($orde->type_order=="package")
                                                <a class="dropdown-item done_service"
                                                    data-id="{{ $orde->package->id }}" data-order="{{ $orde->id }}" href="#!" data-toggle="modal"
                                                    data-target="#loginModal4">@lang('admin.done_service')</a>
                                                @endif
                                                @endcan
                                                @can('user-orderToUser')
                                                <a class="dropdown-item add_order" data-id="{{ $orde->user->id }}" href="#!"
                                                    data-toggle="modal" data-target="#loginModal10">@lang('admin.order_now')</a>
                                                @endcan
                                                @can('order-edit')
                                                <a class="dropdown-item edit_order_status"
                                                    data-id="{{ $orde->id }}" href="#!" data-toggle="modal"
                                                    data-target="#loginModal">@lang('admin.edit_status')</a>
                                                    @endcan
                                                @can('order-delete')
                                                <a class="dropdown-item deleteRecord" href="#!"
                                                    data-id="{{ $orde->id }}">@lang('admin.delete')</a>
                                                    @endcan
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row pb-4 pt-2">
                    <div class="col-12">
                        {{ $order->links('general-components.admin.pagination') }}
                    </div>
                </div>
            @endif
        </div>
    </div>

</div>
