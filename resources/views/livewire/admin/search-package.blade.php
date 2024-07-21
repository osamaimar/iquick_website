<div class="row" id="cancel-row">
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area br-6">
            <div class="d-flex align-items-center justify-content-between">
                @can('package-create')
                   <a href="{{ route('admin.packages.create') }}" class="btn btn-primary">@lang('admin.add_new_package')</a>
                @endcan
                <form class="d-flex">
                    <input wire:model="name" value="{{ old('name') }}" placeholder="{{ __('admin.name') }}" class="form-control me-2" type="search">
                </form>
            </div>
            <div class="table-responsive mb-4 mt-4">
                <table id="zero-config" class="table table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>@lang('admin.name')</th>
                            <th>@lang('admin.price')</th>
                            <th class="no-content">@lang('admin.action')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($package as $packag)
                            <tr id="{{ $packag->id }}">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $packag->name }}</td>
                                <td>{{ $packag->price }} $</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                       @can('package-edit')
                                       <a href="{{ route('admin.packages.edit', $packag->id) }}"
                                        class="btn btn-info mx-2">@lang('admin.edit')</a>
                                       @endcan
                                        @can('package-delete')
                                        <button class="btn btn-danger deleteRecord mx-2"
                                        data-id="{{ $packag->id }}">@lang('admin.delete')</button>
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
                    {{ $package->links('general-components.admin.pagination') }}
                </div>
            </div>
        </div>
    </div>

</div>
