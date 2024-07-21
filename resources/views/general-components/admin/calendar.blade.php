<!DOCTYPE html>
<html lang="ar">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style type="text/css">
         body {
    font-family: sans-serif;
}
a {
    color: #000066;
    text-decoration: none;
}
table {
    border-collapse: collapse;
}
thead {
    vertical-align: bottom;
    text-align: center;
    font-weight: bold;
}
tfoot {
    text-align: center;
    font-weight: bold;
}
th {
    text-align: left;
    padding-left: 0.35em;
    padding-right: 0.35em;
    padding-top: 0.35em;
    padding-bottom: 0.35em;
    vertical-align: top;
}
td {
    padding-left: 0.35em;
    padding-right: 0.35em;
    padding-top: 0.35em;
    padding-bottom: 0.35em;
    vertical-align: top;
}
img {
    margin: 0.2em;
    vertical-align: middle;
}
    </style>
</head>
<body>
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
                    <th>@lang('admin.event_start')</th>
                    <th>@lang('admin.event_end')</th>
                    <th>@lang('admin.status')</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if($events[0]){
                    $even_date=$events[0]->event_start;
                }
                ?>
                @foreach ($events as $even)
                @if ($even->event_start!=$even_date)
                    <tr class="table-info">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="text-black">{{$even->event_start}}</td>
                        <td></td>
                        <td></td>
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
                        <td>{{ $even->event_start }}</td>
                        <td>{{ $even->event_end }}</td>
                        <td><?php echo App\Models\Status::where("id",$even->status)->first()->title; ?></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>