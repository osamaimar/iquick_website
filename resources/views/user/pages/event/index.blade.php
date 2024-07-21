@extends('user.master')


@section('title', __('admin.events'))

@section('page-title', __('admin.events'))
@section('css')
    <style>
        .fc-unthemed .fc-disabled-day{
            background: #050708 !important;
            opacity: 0.8;
        }
    </style>
@endsection
@section('content')

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/6495e88b94cf5d49dc5f7d5e/1h3mfb45n';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->


<!-- Modal -->
    <div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@lang("admin.events")</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-12 mb-4">
                        <div class="col-12">
                            <label class="control-label">@lang('admin.name')</label>
                            <input type="text" class="form-control" id="title" disabled>
                        </div>
                        <div class="col">
                            <label for="inputName" class="control-label">@lang('admin.page_Profile')</label>
                            <input type="text" class="form-control" id="profile_id" disabled>
                        </div>
                        <div class="col-12">
                            <label class="control-label">@lang('admin.description')</label>
                            <textarea id="description" class="form-control" disabled></textarea>
                        </div>
                        <div class="col-12">
                            <label class="control-label">@lang('admin.status_event')</label>
                            <input type="text" class="form-control" id="status" disabled>
                        </div>
                        <div class="col-12">
                            <label class="control-label">@lang('admin.title_event')</label>
                            <input type="text" id="event_name" class="form-control" disabled>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">@lang("user.close")</button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-12 col-lg-12 col-md-12 mb-4">
        <div class="statbox widget box box-shadow">
            <div class="widget-content widget-content-area">
                <div class="row align-items-center">
                    <div class="col-md-6 col-12">
                       <form method="post" action="{{route("user.events/export/data")}}">
                            @csrf
                            <div class="col-md-6 col-12 mb-4">
                                <input type="hidden" class="form-control" name="month" id="month_value">      
                            </div>  
                            <div class="col-md-6 col-12 mb-4">
                                <button class="btn btn-secondary mb-3">@lang('permission.calendar-export')</button>
                            </div> 
                       </form>
                    </div>
                    <div class="col-md-6 col-12" style="text-align: end;">
                        <div class="d-flex flex-wrap align-items-center justify-content-end">
                            @foreach ($status as $statu)

                                <p class="label label-primary"><span style="
                                padding: 0px 10px;
                                background: <?php echo $statu['color']; ?>;
                                border-radius: 50%;
                                margin:0 5px;
                                "></span>
                            <?php echo $statu['status_name']; ?>  
                            </p>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div id='full_calendar_events' style="height: calc(100vh - 226px);"></div>
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
                eventClick: function(event, jsEvent, view) {
                    $('#bookingModal').modal('toggle');
                    $('#title').val(event.title);
                    $('#event_name').val(event.event_name);
                    $('#description').text(event.description);
                    $('#status').val(event.status_name);
                    $('#profile_id').val(event.profile_id);
                }
            });
            setInterval(function() {
                var date_val = $('.fc-center').find('h2').text();
                $("#month_value").val(date_val);
            }, 1000);
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
    <script>
        $("#datepicker").datepicker( {
            format: "mm-yyyy",
            viewMode: "months", 
            minViewMode: "months"
        });
    </script>
@endif
@endsection
