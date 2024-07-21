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
                                <th>@lang('user.details')</th>
                                {{-- <th class="no-content">@lang('admin.action')</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order as $orde)
                                <tr id="{{ $orde->id }}">
                                    <td>{{ $loop->iteration }}</td>
                                    <td><a href="{{route("user.orders.show",$orde->id)}}">{{ $orde->code }}</a></td>
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
                                        <a href="{{route("user.profiles.edit",$orde->profile->id)}}"> {{ $orde->profile->name }}</a>
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
                                        <div class="d-flex justify-content-between align-items-center">
                                        @if ($orde->status == 'done')
                                            <form class="form-horizontal poststars addStar">
                                                <div>
                                                    <div class="col-sm-12">
                                                        <div style="font-size: 18px;">
                                                            <i class="fa-solid fa-star rating" role="button" <?php if(($orde->rating)>4): ?>style="color:#fce708;" <?php endif; ?> wire:click.stop.prevent="rate({{$orde->id}},'5')"></i>
                                                            <i class="fa-solid fa-star rating" role="button" <?php if(($orde->rating)>3): ?>style="color:#fce708;" <?php endif; ?> wire:click.stop.prevent="rate({{$orde->id}},'4')"></i>
                                                            <i class="fa-solid fa-star rating" role="button" <?php if(($orde->rating)>2): ?>style="color:#fce708;" <?php endif; ?> wire:click.stop.prevent="rate({{$orde->id}},'3')"></i>
                                                            <i class="fa-solid fa-star rating" role="button" <?php if(($orde->rating)>1): ?>style="color:#fce708;" <?php endif; ?> wire:click.stop.prevent="rate({{$orde->id}},'2')"></i>
                                                            <i class="fa-solid fa-star rating" role="button" <?php if(($orde->rating)>0): ?>style="color:#fce708;" <?php endif; ?> wire:click.stop.prevent="rate({{$orde->id}},'1')"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            @if ($orde->rating != null)
                                                <div style="font-size: 18px;"><i class="fa-solid fa-star" style="color:#fce708;"></i>
                                                {{ $orde->rating }}</div>
                                            @endif
                                        @endif
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('user.orders.show', $orde->id) }}"
                                            class="btn btn-info mx-2">@lang('user.details')</a>
                                    </td>
                                    {{-- <td class="text-center">
                                        <a href="{{ route('user.export', $orde->id) }}"
                                            class="btn btn-secondary mx-2">@lang('admin.download')</a>
                                    </td> --}}
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
