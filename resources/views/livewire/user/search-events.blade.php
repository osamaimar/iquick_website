<div class="row" id="cancel-row">
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area br-6">
            <div class="align-items-center justify-content-between">
                <div class="row g-3">
                    <div class="col-md-3 col-12">
                        <div class="form-outline">
                            <label class="form-label">@lang('admin.event_start')</label>
                            <input type="date" placeholder="{{ __('admin.event_start') }}" wire:model="event_start"
                                value="{{ old('event_start') }}" class="form-control" />
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="form-outline">
                            <label class="form-label">@lang('admin.event_end')</label>
                            <input type="date" placeholder="{{ __('admin.event_end') }}" wire:model="event_end"
                                value="{{ old('event_end') }}" class="form-control" />
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="form-outline">
                            <label class="form-label">@lang('admin.name')</label>
                            <input type="text" placeholder="{{ __('admin.name') }}" wire:model="event_name"
                                value="{{ old('event_name') }}" class="form-control" />
                        </div>
                    </div>
                </div>
            </div>
            @if ($event != null)
                <div class="table-responsive mb-4 mt-4">
                    <table id="zero-config" class="table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('admin.name')</th>
                                <th>@lang('admin.event_start')</th>
                                <th>@lang('admin.event_end')</th>
                                <th>@lang('admin.description')</th>
                                <th>@lang('admin.page_Profile')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($event as $even)
                                <tr id="{{ $even->id }}">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $even->event_name }}</td>
                                    <td>{{ $even->event_start }}</td>
                                    <td>{{ $even->event_end }}</td>
                                    <td>{{ $even->description }}</td>
                                    <td>{{ $even->profile->name }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row pb-4 pt-2">
                    <div class="col-12">
                        {{ $event->links('general-components.admin.pagination') }}
                    </div>
                </div>
            @endif
        </div>
    </div>

</div>
