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
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $orde)
            <tr id="{{ $orde->id }}">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $orde->code }}</td>
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
            </tr>
            @endforeach
        </tbody>
    </table>
</div>