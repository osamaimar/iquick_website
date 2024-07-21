<div class="row" id="cancel-row">
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area br-6">
            <div class="d-flex align-items-center justify-content-between">
                @can("attachmen-create")
                   <a href="{{ route('admin.attachments.create') }}" class="btn btn-primary">@lang('admin.add_new_attach')</a>
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
                            <th class="no-content">@lang('admin.action')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($attachment as $attachmen)
                            <tr id="{{ $attachmen->id }}">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $attachmen->name }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        @can('attachment-edit')
                                        <a href="{{ route('admin.attachments.edit', $attachmen->id) }}"
                                            class="btn btn-info mx-2">@lang('admin.edit')</a>
                                        @endcan
                                        @can('attachment-delete')
                                        <button class="btn btn-danger deleteRecord mx-2"
                                        data-id="{{ $attachmen->id }}">@lang('admin.delete')</button>
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
                    {{ $attachment->links('general-components.admin.pagination') }}
                </div>
            </div>
        </div>
    </div>

</div>
