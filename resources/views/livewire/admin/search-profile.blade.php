<div class="row" id="cancel-row">
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area br-6">
            <div class="align-items-center justify-content-between">
                @can('profile-profileExport')
                   <a href="{{ route('admin.profile/export/data') }}" class="btn btn-secondary mb-2 mx-4">@lang('permission.profile-profileExport')</a>
                @endcan
                <div class="row g-3">
                    <div class="col-md-3 col-12">
                        <div class="form-outline">
                            <label class="form-label">@lang('admin.code')</label>
                            <input type="text" placeholder="{{ __('admin.code') }}" wire:model="code"
                                value="{{ old('code') }}" class="form-control" />
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="form-outline">
                            <label class="form-label">@lang('admin.users')</label>
                            <select class="form-control" wire:model="user_id">
                                <option selected></option>
                                @foreach ($user as $use)
                                    <option value="{{ $use->id }}">{{ $use->firstname . ' ' . $use->lastname }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="form-outline">
                            <label class="form-label">@lang('admin.name')</label>
                            <input type="text" placeholder="{{ __('admin.name') }}" wire:model="name"
                                value="{{ old('name') }}" class="form-control" />
                        </div>
                    </div>
                </div>
            </div>
            @if ($profile != null)
                <div class="table-responsive mb-4 mt-4">
                    <table id="zero-config" class="table table-hover table-bordered mb-4" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('admin.code')</th>
                                <th>@lang('admin.name')</th>
                                <th>@lang('user.link')</th>
                                <th>@lang('admin.user')</th>
                                <th class="no-content">@lang('admin.action')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($profile as $profil)
                                <tr id="{{ $profil->id }}">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $profil->code }}</td>
                                    <td>{{ $profil->name }}</td>
                                    <td><a href="{{ $profil->link }}" target="_blank">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-edit">
                                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                </path>
                                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                </path>
                                            </svg>
                                        </a></td>
                                    <td>{{ $profil->user->firstname . ' ' . $profil->user->lastname }}</td>
                                    <td class="text-center">
                                        <div class="dropdown custom-dropdown">
                                            <a class="dropdown-toggle" href="#" role="button"
                                                id="dropdownMenuLink7" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <h1>...</h1>
                                            </a>
                                            <div class="dropdown-menu solve_menu_problem" aria-labelledby="dropdownMenuLink7">
                                                @can('profile-edit')
                                                <a class="dropdown-item" href="{{route('admin.profiles.edit',$profil->id)}}">@lang('admin.edit')</a>
                                                @endcan
                                                @can('user-orderToUser')
                                                <a class="dropdown-item add_order" data-id="{{ $profil->user->id }}" href="#!"
                                                    data-toggle="modal" data-target="#loginModal10">@lang('admin.order_now')</a>
                                                @endcan
                                                @can('profile-storeAttach')
                                                <a class="dropdown-item add_attach" href="#!"
                                                data-id="{{ $profil->id }}" href="#!" data-toggle="modal"
                                                data-target="#loginModal1">@lang('admin.add_new_attach')</a>
                                                @endcan
                                                @can('profile-delete')
                                                <a class="dropdown-item deleteRecord" href="#!"
                                                data-id="{{ $profil->id }}">@lang('admin.delete')</a>
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
                        {{ $profile->links('general-components.admin.pagination') }}
                    </div>
                </div>
            @endif
        </div>
    </div>

</div>
