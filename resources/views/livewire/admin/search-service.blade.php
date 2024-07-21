<div class="row" id="cancel-row">
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area br-6">
            <div class="d-flex align-items-center justify-content-between">
                @can('service-create')
                   <a href="{{ route('admin.services.create') }}" class="btn btn-primary">@lang('admin.add_new_service')</a>
                @endcan
                <form class="d-flex">
                    <input wire:model="name" value="{{ old('name') }}" placeholder="{{ __('admin.name') }}"
                        class="form-control me-2" type="search">
                </form>
            </div>
            <div class="table-responsive mb-4 mt-4">
                <table id="zero-config" class="table table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>@lang('admin.name')</th>
                            <th>@lang('admin.price')</th>
                            <th>@lang('admin.status')</th>
                            <th class="no-content">@lang('admin.action')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($service as $servic)
                            <tr id="{{ $servic->id }}">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $servic->name }}</td>
                                <td>{{ $servic->price }} $</td>
                                <td>
                                    @if ($servic->status == '1')
                                    <span class="badge badge-secondary">@lang('admin.public')</span>
                                    @else
                                    <span class="badge badge-warning"> @lang('admin.private') </span>
                                    @endif    
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        @can('service-edit')
                                        <a href="{{ route('admin.services.edit', $servic->id) }}"
                                            class="btn btn-info mx-2">@lang('admin.edit')</a>
                                        @endcan
                                        @can('service-delete')
                                        <button class="btn btn-danger deleteRecord mx-2"
                                        data-id="{{ $servic->id }}">@lang('admin.delete')</button>
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
                    {{ $service->links('general-components.admin.pagination') }}
                </div>
            </div>
        </div>
    </div>

</div>
