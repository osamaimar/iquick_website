<div class="table-responsive mb-4 mt-4">
    <table id="zero-config" class="table table-hover table-bordered mb-4" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>@lang('admin.code')</th>
                <th>@lang('admin.name')</th>
                <th>@lang('user.link')</th>
                <th>@lang('admin.user')</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($profiles as $profil)
                <tr id="{{ $profil->id }}">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $profil->code }}</td>
                    <td>{{ $profil->name }}</td>
                    <td>{{$profil->link}}</td>
                    <td>{{ $profil->user->firstname . ' ' . $profil->user->lastname }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>