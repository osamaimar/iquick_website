<div class="row" id="cancel-row">
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area br-6">
            <div class="align-items-center justify-content-between">
                @can('event-export')
                <div class="col-md-6 col-12">
                    <form method="post" action="{{route("admin.events/export/data")}}">
                         @csrf
                         <div class="col-md-6 col-12 mb-4">
                             <input type="month" class="form-control" name="month">      
                         </div>  
                         <div class="col-md-6 col-12 mb-4">
                             <button class="btn btn-secondary mb-3">@lang('permission.event-export')</button>
                         </div> 
                    </form>
                 </div>
                @endcan
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
                                <th>@lang('admin.description')</th>
                                <th>@lang('admin.user')</th>
                                <th>@lang('admin.page_Profile')</th>
                                <th>@lang('admin.title_event')</th>
                                <th class="no-content">@lang('admin.action')</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if($event[0]){
                                $even_date=$event[0]->event_start;
                            }
                            ?>
                            @foreach ($event as $even)
                            @if ($even->event_start!=$even_date)
                                <tr class="table-info">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-black">{{$even->event_start}}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <?php
                                    $even_date=$even->event_start;
                                ?>
                            @endif
                                <tr id="{{ $even->id }}">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $even->title }}</td>
                                    <td>{{ $even->description }}</td>
                                    <td>{{ $even->user->firstname.' '.$even->user->lastname }}</td>
                                    <td>{{ $even->profile->name }}</td>
                                    <td>{{ $even->event_name }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            @can('event-edit')
                                            <a href="{{ route('admin.events.edit', $even->id) }}"
                                                class="btn btn-info mx-2">@lang('admin.edit')</a>
                                            @endcan
                                           @can('event-delete')
                                           <button class="btn btn-danger deleteRecord mx-2"
                                           data-id="{{ $even->id }}">@lang('admin.delete')</button>
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
                        {{ $event->links('general-components.admin.pagination') }}
                    </div>
                </div>
            @endif
        </div>
    </div>

</div>
