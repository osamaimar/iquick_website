@extends('admin.master')


@section('title', __('admin.edit_event'))

@section('page-title', __('admin.edit_event'))

@section('content')
<div class="row" id="cancel-row">
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area br-6">
            <a href="{{ route('admin.events.index') }}" class="btn btn-info mb-2">@lang('admin.events')</a>
            <form action="{{ route('admin.events.update', $event->id) }}" method="post" class="p-4"
                enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row mb-4">
                    <div class="col-12 col-md-6 mb-4">
                        <label for="inputName" class="control-label">@lang('admin.user')</label>
                        <select id="client" name="client_id" class="form-control SlectBox"
                            onclick="console.log($(this).val())" onchange="console.log('change is firing')">
                            <!--placeholder-->
                            <option></option>
                            @foreach ($client as $clien)
                                <option value="{{ $clien->id }}" @if ($clien->id == $event->client_id) selected @endif>
                                    {{ $clien->firstname.' '.$clien->lastname }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <label for="inputName" class="control-label">@lang('admin.page_Profile')</label>
                        <select id="profile" name="profile_id" class="form-control">
                            <option value="{{$event->profile->id}}">{{$event->profile->name}}</option>
                        </select>
                    </div>
                    <div class="col-12 mb-4">
                        <input type="text" name="title" value="{{ $event->title }}" class="form-control"
                            placeholder=@lang('admin.name')>
                    </div>
                    <div class="col-12 mb-4">
                        <textarea class="form-control" name="description">{{ $event->description }}</textarea>
                    </div>
                    <div class="col-12 mb-4">
                        <label class="control-label">@lang('admin.status')</label>
                        <select name="status" class="form-control">
                            <option></option>
                            @foreach ($status as $statu)
                               <option value="{{$statu->id}}"@if($event->status==$statu->id) selected @endif>{{ $statu->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12">
                        <label class="control-label">@lang('admin.title_event')</label>
                        <select name="event_name" class="form-control SlectBox">
                            @foreach ($services as $service)
                            <option value="{{ $service->name }}"@if ($event->event_name==$service->name) selected @endif> {{ $service->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <input type="submit" name="submit" value="{{__('admin.edit_event')}}" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>
@endsection
@section('ajax')
    <script>
        $(document).ready(function() {
            $('select[name="client_id"]').on('change', function() {
                var client = $(this).val();
                if (client) {
                    $.ajax({
                        url: `{{ url('dashborad/getProfile/${client}') }}`,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="profile_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="profile_id"]').append(
                                    '<option value="' +
                                    value['id'] + '">' + value['name'] + '</option>'
                                );
                            });
                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>
@endsection
