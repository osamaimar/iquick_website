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
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $use)
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
            </tr>
            @endforeach
        </tbody>
    </table>
</div>