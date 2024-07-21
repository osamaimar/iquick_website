<div class="row" id="cancel-row">
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area br-6">
            @can('user-create')
                <a href="{{ route('admin.users.create') }}" class="btn btn-primary mb-2">@lang('admin.add_new_user')</a>
            @endcan
            @can('user-export')
                <a href="{{ route('admin.users/export/data') }}" class="btn btn-secondary mb-2 mx-4">@lang('permission.user-export')</a>
            @endcan
            <div class="d-flex flex-wrap align-items-center justify-content-between">
                <div class="row w-100">
                    <div class="col-md-3 mb-2 col-12">
                        <div class="form-outline">
                            <label class="form-label">@lang('admin.code')</label>
                            <input type="text" placeholder="{{ __('admin.code') }}" wire:model="code"
                                value="{{ old('code') }}" class="form-control" />
                        </div>
                    </div>
                    <div class="col-md-3 mb-2 col-12">
                        <div class="form-outline">
                            <label class="form-label">@lang('admin.name')</label>
                            <input type="text" placeholder="{{ __('admin.name') }}" wire:model="name"
                                value="{{ old('name') }}" class="form-control" />
                        </div>
                    </div>
                    <div class="col-md-3 mb-2 col-12">
                        <div class="form-outline">
                            <label class="form-label">@lang('admin.email')</label>
                            <input type="text" placeholder="{{ __('admin.email') }}" wire:model="email"
                                value="{{ old('email') }}" class="form-control" />
                        </div>
                    </div>
                    <div class="col-md-3 mb-2 col-12">
                        <div class="form-outline">
                            <label class="form-label">@lang('admin.status')</label>
                            <select class="form-control" wire:model="status" aria-label="Default select example">
                                <option selected></option>
                                <option value="0">@lang('admin.not_active')</option>
                                <option value="1">@lang('admin.active')</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3 mb-2 col-12">
                        <div class="form-outline">
                            <label class="form-label">@lang('admin.type')</label>
                            <select class="form-control" wire:model="type" aria-label="Default select example">
                                <option selected></option>
                                <option value="user">@lang('admin.user')</option>
                                <option value="admin">@lang('admin.admin')</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive mb-4 mt-4">
                <table id="zero-config" class="table table-hover table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>@lang('admin.code')</th>
                            <th>@lang('admin.name')</th>
                            <th>@lang('admin.email')</th>
                            <th>@lang('admin.status')</th>
                            <th>@lang('admin.type')</th>
                            <th>@lang('admin.created_at')</th>
                            <th>@lang('admin.conn')</th>
                            <th>@lang('admin.updated_at')</th>
                            <th>@lang('admin.profiles')</th>
                            <th>@lang('admin.orders')</th>
                            <th>@lang('admin.profile_history')</th>
                            <th class="no-content">@lang('admin.action')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $use)
                        <tr id="{{ $use->id }}">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $use->code }}</td>
                            <td>{{ $use->firstname.' '.$use->lastname }}</td>
                            <td>{{ $use->email }}</td>
                            <td>
                                @if ($use->status == '1')
                                <span class="badge badge-success">@lang('admin.active')</span>
                                @else
                                <span class="badge badge-danger"> @lang('admin.not_active') </span>
                                @endif
                            </td>
                            <td>
                                @if ($use->type == 'user')
                                @lang('admin.user')
                                @else
                                @lang('admin.admin')
                                @endif
                            </td>
                            <td>
                                {{ $use->created_at }}
                            </td>
                            <td>
                                @if (Cache::has('user-is-online-' . $use->id))
                                <span class="badge badge-success">@lang('admin.online')</span>
                                @else
                                <span class="badge badge-danger">@lang('admin.not_online')</span>
                                @endif
                            </td>
                            <td>
                                @if (Cache::has('user-is-online-' . $use->id))
                                ({{ $use->updated_at }})
                                @else
                                ({{ $use->updated_at }})
                                @endif
                            </td>
                            <td class="text-center">
                                @can('user-getProfileUser')
                                @if ($use->type=="user")
                                <a href="{{ route('admin.get/profile/user', $use->id) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-book">
                                        <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                                        <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z">
                                        </path>
                                    </svg>
                                </a>
                                @endif
                                @endcan
                            </td>
                            <td class="text-center">
                                @can('user-getOrderUser')
                                @if ($use->type=="user")
                                <a href="{{ route('admin.get/order/user', $use->id) }}" class="d-block">
                                    <i style="font-size: 26px;" class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                                @endif
                                @endcan
                            </td>
                            <td class="text-center">
                                @can('user-getProfileHistory')
                                @if ($use->type=="user")
                                <a href="{{ route('admin.profile/history', $use->id) }}" class="d-block">
                                    <i style="font-size: 26px;" class="fa fa-cog" aria-hidden="true"></i>
                                </a>
                                @endif
                                @endcan
                            </td>
                            <td>
                                <div class="dropdown custom-dropdown">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink7"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <h1>...</h1>
                                    </a>
                                    <div class="dropdown-menu solve_menu_problem" aria-labelledby="dropdownMenuLink7">
                                        @can('user-changeUserStatus')
                                        <form action="{{ url("dashborad/change/status/user/$use->id") }}" method="post">
                                            @csrf
                                            @method("put")
                                            <input  type="hidden"  name="status"
                                                value="@if ($use->status == '0')
                                                1
                                                @else
                                                0
                                                @endif"
                                            />
                                            <button type="submit" class="dropdown-item">
                                                @if ($use->status == '0')
                                                @lang('admin.notblock')
                                                @else
                                                @lang('admin.block')
                                                @endif
                                            </button>
                                        </form>
                                        @endcan
                                       @if ($use->type=="user")
                                       @can('user-orderToUser')
                                       <a class="dropdown-item add_order" data-id="{{ $use->id }}" href="#!"
                                           data-toggle="modal" data-target="#loginModal3">@lang('admin.order_now')</a>
                                       @endcan
                                       @endif
                                       @can('user-edit')
                                       <a class="dropdown-item"
                                       href="{{ route('admin.users.edit', $use->id) }}">@lang('admin.edit')</a>
                                       @endcan
                                        @can('user-delete')
                                        <a class="dropdown-item deleteRecord" href="#!"
                                        data-id="{{ $use->id }}">@lang('admin.delete')</a>
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
                    {{ $user->links('general-components.admin.pagination') }}
                </div>
            </div>
        </div>
    </div>

</div>