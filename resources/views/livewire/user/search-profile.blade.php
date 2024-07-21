<div class="row" id="cancel-row">
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area br-6">
            <div class="d-flex align-items-center justify-content-between">
                <a href="{{ route('user.profiles.create') }}" class="btn btn-primary">@lang('admin.add new')</a>
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
                            <th>@lang('user.link')</th>
                            <th class="no-content">@lang('admin.action')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($profile as $profil)
                            <tr id="{{ $profil->id }}">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $profil->name }}</td>
                                <td><a href="{{ $profil->link }}" target="_blank">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
                                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                        </svg>
                                    </a></td>
                                <td>
                                    @if (App\Models\Order::where('profile_id', $profil->id)->first()||App\Models\Attachment::where('attachmentable_id',$profil->id)->where('attachmentable_type','App\Models\Profile')->first())
                                        <a href="{{ route('user.profiles.show', $profil->id) }}"
                                            class="btn btn-info mx-2">@lang('admin.attachments')</a>
                                    @else
                                        <div class="d-flex align-items-center">
                                            <a href="{{ route('user.profiles.edit', $profil->id) }}"
                                                class="btn btn-info mx-2">@lang('admin.edit')</a>
                                            @if ($profil->status!="1")
                                            <button class="btn btn-danger deleteRecord mx-2"
                                            data-id="{{ $profil->id }}">@lang('admin.delete')</button>
                                            @endif
                                        </div>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="row pb-4 pt-2">
                <div class="col-12">
                    {{ $profile->links('general-components.admin.pagination') }}
                </div>
            </div>
        </div>
    </div>

</div>
