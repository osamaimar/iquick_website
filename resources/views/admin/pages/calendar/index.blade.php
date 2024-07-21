@extends('admin.master')


@section('title', __('admin.calendars'))
@section('css')
    <style>
        .fc-unthemed .fc-disabled-day{
            background: #050708 !important;
            opacity: 0.8;
        }
    </style>
@endsection
@section('content')
<!-- Modal -->
@can('calendar-create')
<div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">@lang("admin.events")</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="col-12 mb-4">
                    <div class="alterErrorletter"></div>
                    <div class="col-12">
                        <label class="control-label">@lang('admin.name')</label>
                        <input type="text" class="form-control" id="title">
                    </div>
                    <div class="col">
                        <input type="hidden" id="client_id" name="client"
                            value="<?php if(session()->get('userCalendar_id')): echo session()->get('userCalendar_id'); endif; ?>"
                            class="form-control">
                    </div>
                    <div class="col">
                        <label for="inputName" class="control-label">@lang('admin.page_Profile')</label>
                        <select id="profile_id" name="profile" class="form-control">
                            @foreach ($profile as $profile)
                            <option value="{{ $profile->id }}"> {{ $profile->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12">
                        <label class="control-label">@lang('admin.description')</label>
                        <textarea id="description" class="form-control"></textarea>
                    </div>
                    <div class="col-12">
                        <label class="control-label">@lang('admin.status_event')</label>
                        <select id="status" class="form-control">
                            @foreach ($status as $statu)
                            @if ($statu->status!='0')
                                <option value="{{$statu->id}}">{{ $statu->title }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12">
                        <label class="control-label">@lang('admin.title_event')</label>
                        <select id="event_name" class="form-control SlectBox">
                            <option selected></option>
                            @foreach ($services as $service)
                            <option value="{{ $service->name }}"> {{ $service->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">@lang("user.close")</button>
                <a id="saveBtn" class="btn btn-primary">@lang("admin.add_new_event")</a>
            </div>
        </div>
    </div>
</div>
@endcan
<div class="row layout-top-spacing" id="cancel-row">
    <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="statbox widget box box-shadow">
            <div class="row align-items-center">
                {{-- <div class="col-12">
                    @can('event-export')
                    <a href="{{ route('admin.events/export/data') }}" class="btn btn-secondary mb-2 mx-4">@lang('permission.event-export')</a>
                    @endcan
                </div> --}}
                @can('calendar-export')
                    <div class="col-12">
                        <form method="post" action="{{route("admin.events/export/data/user")}}">
                            @csrf
                            <div class="col-md-6 col-12 mb-4">
                                <input type="hidden" class="form-control" name="month" id="month_value">      
                            </div>  
                            <div class="col-md-6 col-12 mb-4">
                                <button class="btn btn-secondary mb-3">@lang('permission.calendar-export')</button>
                            </div> 
                        </form>
                    </div>
                 @endcan
                <div class="col-md-6 col-12">
                    <form action="{{url('dashborad/user/calendar')}}" method="get">
                        <div class="col-4 mb-2">
                            <label for="inputName" class="control-label">@lang('admin.user')</label>
                            <select name="clientuser_id" class="form-control SlectBox" onchange="this.form.submit()">
                                <option selected></option>
                                @foreach ($client as $clien)
                                <option value="{{ $clien->id }}" @if(session()->get('userCalendar_id')==$clien->id) selected
                                    @endif> {{ $clien->firstname.' '.$clien->lastname }}</option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                </div>
                {{-- <div class="col-md-6 col-12">
                    <a href="{{ route('admin.export/pdf') }}" class="btn btn-secondary mb-3">@lang('permission.event-export')</a>
                </div> --}}
                <div class="col-md-6 col-12" style="text-align: end;">
                    <div class="d-flex flex-wrap align-items-center justify-content-end">
                        @foreach ($status as $statu)
                        <p class="label label-primary"><span style="
                            padding: 0px 10px;
                            background: {{$statu->color}};
                            border-radius: 50%;
                            margin:0 5px;
                            "></span>
                        {{$statu->title}}    
                        </p>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <div id='full_calendar_events' style="height: calc(100vh - 226px);"></div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('ajax')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ asset('admin/dark/plugins/fullcalendar/moment.min.js') }}"></script>
<script src="{{ asset('admin/dark/plugins/fullcalendar/flatpickr.js') }}"></script>
<script src="{{ asset('admin/dark/plugins/fullcalendar/fullcalendar.min.js') }}"></script>
<!-- END PAGE LEVEL SCRIPTS -->

<!--  BEGIN CUSTOM SCRIPTS FILE  -->
<script src="{{ asset('admin/dark/plugins/fullcalendar/custom-fullcalendar.advance.js') }}"></script>
<!--  END CUSTOM SCRIPTS FILE  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.19.7/lang-all.js"></script>

<script>
$(document).ready(function() {
    var events = @json($events);
    var SITEURL = "{{ url('/dashborad') }}";
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var calendar = $('#full_calendar_events').fullCalendar({
        lang: 'ar',
        editable: true,
        header: {
            left: 'prev,next today',
            center: 'title',
            right: ''
        },
        showNonCurrentDates: false,
        events: events,
        displayEventTime: true,
        eventRender: function(event, element, view) {
            if (event.allDay === 'true') {
                event.allDay = true;
            } else {
                event.allDay = false;
            }
        },
        selectable: true,
        selectHelper: true,
        select: function(start, end, allDay) {
            $("#event_name").val('');
            $("#description").val('');
            $("#profile_id").val('');
            $("#status").val('');
            $("#title").val('');
            $('#bookingModal').modal('toggle');
            $('#saveBtn').on('click', function() {
                $("#saveBtn").attr("disabled", true);
                var event_name = $("#event_name").val();
                var description = $("#description").val();
                var profile_id = $("#profile_id").val();
                var client_id = $("#client_id").val();
                var status = $("#status").val();
                var title = $("#title").val();
                var event_start = $.fullCalendar.formatDate(start,
                    "Y-MM-DD HH:mm:ss");
                var event_end = $.fullCalendar.formatDate(end,
                    "Y-MM-DD HH:mm:ss");
                let opError = "";
                $.ajax({
                    url: SITEURL + "/calendar-crud-ajax",
                    data: {
                        event_name: event_name,
                        title: title,
                        event_start: event_start,
                        event_end: event_end,
                        description: description,
                        profile_id: profile_id,
                        client_id: client_id,
                        status: status,
                    },
                    type: "POST",
                    success: function(data) {
                        $('#bookingModal').modal('hide');
                        $("#saveBtn").attr("disabled", false);
                        var description = $("#description").val("");
                        var profile_id = $("#profile_id").val("");
                        var client_id = $("#client_id").val("");
                        var title = $("#title").val("");
                        displayMessage("Event created.");
                        calendar.fullCalendar('renderEvent', {
                            id: data.id,
                            event_name: data.event_name,
                            title: data.title,
                            start: event_start,
                            end: event_end,
                            color: data.color,
                            allDay: allDay
                        }, true);
                        calendar.fullCalendar('unselect');
                        location.reload();
                    },
                    error: function(errorsub) {
                        $("#saveBtn").attr("disabled", false);
                        if (errorsub) {
                            if (errorsub.responseJSON.errors.client_id) {
                                opError +=
                                    '<div class="alert alert-danger">' +
                                    errorsub.responseJSON.errors
                                    .client_id + '</div>';
                            } else if (errorsub.responseJSON.errors
                                .profile_id) {
                                opError +=
                                    '<div class="alert alert-danger">' +
                                    errorsub.responseJSON.errors
                                    .profile_id + '</div>';
                            }else if (errorsub.responseJSON.errors
                                .description) {
                                opError +=
                                    '<div class="alert alert-danger">' +
                                    errorsub.responseJSON.errors
                                    .description + '</div>';
                            }else if (errorsub.responseJSON.errors
                                .title) {
                                opError +=
                                    '<div class="alert alert-danger">' +
                                    errorsub.responseJSON.errors
                                    .title + '</div>';
                            }
                            else if (errorsub.responseJSON.errors
                                .status) {
                                opError +=
                                    '<div class="alert alert-danger">' +
                                    errorsub.responseJSON.errors
                                    .status + '</div>';
                            }
                            $('.alterErrorletter').html(" ");
                            $('.alterErrorletter').append(opError);
                        }
                    }
                });
            });
        },
        eventDrop: function(event, delta) {
            var event_start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
            var event_end = $.fullCalendar.formatDate(event.end, "Y-MM-DD");
            $.ajax({
                url: SITEURL + '/calendar-crud-ajax-update',
                data: {
                    event_start: event_start,
                    event_end: event_end,
                    id: event.id,
                },
                type: "POST",
                success: function(response) {
                    var description = $("#description").val("");
                    var profile_id = $("#profile_id").val("");
                    var client_id = $("#client_id").val("");
                    displayMessage("Event updated");
                    location.reload();
                }
            });
        },
        eventClick: function(event) {
            $("#event_name").val(event.event_name);
            $("#description").val(event.description);
            $("#profile_id").val(event.profile_id);
            $("#client_id").val(event.client_id);
            $("#status").val(event.status);
            $("#title").val(event.title);
            $('#bookingModal').modal('toggle');
            $('#saveBtn').on('click', function() {
                $("#saveBtn").attr("disabled", true);
                var event_name = $("#event_name").val();
                var description = $("#description").val();
                var profile_id = $("#profile_id").val();
                var client_id = $("#client_id").val();
                var title = $("#title").val();
                var status = $("#status").val();
                let opError = "";
                $.ajax({
                    url: SITEURL + "/calendar-crud-update",
                    data: {
                        event_id:event.id,
                        event_name: event_name,
                        title: title,
                        description: description,
                        profile_id: profile_id,
                        client_id: client_id,
                        status: status,
                    },
                    type: "POST",
                    success: function(data) {
                        $('#bookingModal').modal('hide');
                        $("#saveBtn").attr("disabled", false);
                        var description = $("#description").val("");
                        var profile_id = $("#profile_id").val("");
                        var client_id = $("#client_id").val("");
                        var title = $("#title").val("");
                        var event_name = $("#event_name").val("");
                        displayMessage("Event updated.");
                        location.reload();
                    },
                    error: function(errorsub) {
                        $("#saveBtn").attr("disabled", false);
                        if (errorsub) {
                            if (errorsub.responseJSON.errors.client_id) {
                                opError +=
                                    '<div class="alert alert-danger">' +
                                    errorsub.responseJSON.errors
                                    .client_id + '</div>';
                            } else if (errorsub.responseJSON.errors
                                .profile_id) {
                                opError +=
                                    '<div class="alert alert-danger">' +
                                    errorsub.responseJSON.errors
                                    .profile_id + '</div>';
                            }else if (errorsub.responseJSON.errors
                                .description) {
                                opError +=
                                    '<div class="alert alert-danger">' +
                                    errorsub.responseJSON.errors
                                    .description + '</div>';
                            }else if (errorsub.responseJSON.errors
                                .title) {
                                opError +=
                                    '<div class="alert alert-danger">' +
                                    errorsub.responseJSON.errors
                                    .title + '</div>';
                            }
                            $('.alterErrorletter').html(" ");
                            $('.alterErrorletter').append(opError);
                        }
                    }
                });
            });
        }
    });
    setInterval(function() {
        var date_val = $('.fc-center').find('h2').text();
        $("#month_value").val(date_val);
    }, 1000);
    
});
function displayMessage(message) {
    swal(message, 'success');
}
$("#bookingModal").on("hidden.bs.modal", function() {
    $('#saveBtn').unbind();
});
$('.fc-event').css('font-size', '13px');
$('.fc-event').css('width', '20px');
$('.fc-event').css('border-radius', '50%');
</script>
@if (isset($_COOKIE['mode']) && $_COOKIE['mode'] != 'dark')
<script>
    setInterval(function() {
        $(".fc-day").hover(function() {
            $(this).css("background-color", "#e0e6ed");
        }, function() {
            $(this).css("background-color", "");
        });
        $(".fc-event-container").hover(function() {
            $(this).css('cursor', 'pointer');
        });
        $(".fc-disabled-day").hover(function() {
            $(this).css("background-color", "#050708");
        });
    }, 1000);
    </script>
@else
<script>
setInterval(function() {
    $(".fc-day").hover(function() {
        $(this).css("background-color", "rgb(66 95 102)");
    }, function() {
        $(this).css("background-color", "");
    });
    $(".fc-event-container").hover(function() {
        $(this).css('cursor', 'pointer');
    });
    $(".fc-disabled-day").hover(function() {
            $(this).css("background-color", "#050708");
    });
}, 1000);
</script>
@endif
@endsection