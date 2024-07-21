@extends('user.master')


@section('title', __('admin.view_all'))
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
    <div class="row layout-top-spacing">
        {{-- <div class="col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing d-flex">
            <div class="widget widget-card-four w-100">
                <div class="widget-content">
                    <div class="w-content">
                        <div class="w-info">
                            <a href="{{ route('user.orders.index') }}">
                                <h6 class="value">@lang('admin.orders')</h6>
                            </a>
                            <p class="">{{ $order->count() }}</p>
                        </div>
                        <div class="">
                            <div class="w-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-dollar-sign">
                                    <line x1="12" y1="1" x2="12" y2="23"></line>
                                    <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar bg-gradient-secondary" role="progressbar"
                            style="width: {{ $order->count() }}px" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100">
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        {{-- <div class="col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing d-flex">
            <div class="widget widget-table-one w-100">
                <div class="widget-heading">
                    <a href="{{ route('user.orders.index') }}">
                    <h5 class="">@lang('admin.orders')</h5>
                    </a>
                </div>

                <div class="widget-content">
                
                    <div class="transactions-list">
                        <div class="t-item">
                            <div class="t-company-name">
                                <div class="t-icon">
                                    <div class="avatar avatar-xl " style="    width: 70px;
                                    height: 70px;">
                                        <span class="avatar-title rounded-circle"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="feather feather-dollar-sign">
                                            <line x1="12" y1="1" x2="12" y2="23"></line>
                                            <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                                        </svg>  </span>
                                    </div>
                                </div>
                                <div class="t-name">
                                    <h4>@lang('admin.orders')</h4>
                                    <p class="meta-date">{{ $order->count() }}</p>
                                </div>
                            </div>
                            <div class="t-rate rate-inc">
                                <p><span>+$ {{$order->avg('total_price')}}</span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-up"><line x1="12" y1="19" x2="12" y2="5"></line><polyline points="5 12 12 5 19 12"></polyline></svg></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        {{-- <div class="col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing d-flex">
            <div class="widget widget-account-invoice-two w-100">
                <div class="widget-content">
                    <div class="account-box">
                        <div class="info">
                            <a href="{{ route('user.profiles.index') }}">
                                <h5 class="">@lang('user.profiles')</h5>
                            </a>
                            <p class="inv-balance"
                                style="font-size: 20px;    color: #dccff7;background-color: #5c1ac3;height: 45px;display: inline-flex;width: 45px;
    align-self: center;
    justify-content: center;
    border-radius: 50%;
    padding: 10px;">
                                {{ $profile->count() }}</p>
                        </div>
                        <div class="acc-action">
                            <div class="">
                                <a href="{{ route('user.profiles.index') }}"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-plus">
                                        <line x1="12" y1="5" x2="12" y2="19"></line>
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                    </svg></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing d-flex">
            <div class="row w-100">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                    <div class="widget widget-card-four w-100">
                        <div class="widget-content">
                            <div class="w-content">
                                <div class="w-info">
                                    <a href="{{ route('user.orders.index') }}">
                                        <h6 class="value">@lang('admin.orders')</h6>
                                    </a>
                                    <p class="">{{ $order->count() }}</p>
                                </div>
                                <div class="">
                                    <div class="w-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="feather feather-dollar-sign">
                                            <line x1="12" y1="1" x2="12" y2="23"></line>
                                            <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="progress">
                                <div class="progress-bar bg-gradient-secondary" role="progressbar"
                                    style="width: {{ $order->count() }}px" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-12  d-flex">
                    <div class="widget widget-account-invoice-two w-100">
                        <div class="widget-content">
                            <div class="account-box">
                                <div class="info">
                                    <a href="{{ route('user.profiles.index') }}">
                                        <h5 class="">@lang('user.profiles')</h5>
                                    </a>
                                    <p class="inv-balance"
                                        style="font-size: 20px;    color: #dccff7;background-color: #5c1ac3;height: 45px;display: inline-flex;width: 45px;
            align-self: center;
            justify-content: center;
            border-radius: 50%;
            padding: 10px;">
                                        {{ $profile->count() }}</p>
                                </div>
                                <div class="acc-action">
                                    <div class="">
                                        <a href="{{ route('user.profiles.index') }}"><svg xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" class="feather feather-plus">
                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                            </svg></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-12  d-flex">
                    <div class="widget widget-account-invoice-two w-100">
                        <div class="widget-content">
                            <div class="account-box">
                                <div class="info">
                                    <a href="{{ route('user.orders.index') }}">
                                        <h5 class="">@lang('admin.orders_all')</h5>
                                    </a>
                                    <p class="inv-balance"
                                        style="font-size: 20px;    color: #dccff7;background-color: #5c1ac3;height: 45px;display: inline-flex;width: 45px;
            align-self: center;
            justify-content: center;
            border-radius: 50%;
            padding: 10px;">
                                        {{ $orders_count }}</p>
                                </div>
                                <div class="acc-action">
                                    <div class="">
                                        <a href="{{ route('user.orders.index') }}"><svg xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" class="feather feather-plus">
                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                            </svg></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing d-flex">
            <div class="widget widget-table-two widget-activity-three w-100">

                <div class="widget-heading">
                    <h5 class="">@lang('admin.latest_orders')</h5>
                </div>

                <div class="widget-content">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="th-content">@lang('admin.type_order')</div>
                                    </th>
                                    <th>
                                        <div class="th-content">@lang('admin.status')</div>
                                    </th>
                                    <th>
                                        <div class="th-content th-heading">@lang('admin.total_price')</div>
                                    </th>
                                    <th>
                                        <div class="th-content">@lang('admin.profile')</div>
                                    </th>
                                    <th>
                                        <div class="th-content">@lang('user.view_all1')</div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($latest_orders as $latest_order)
                                    <tr>
                                        <td>
                                            <div class="td-content product-brand">
                                                @if ($latest_order->type_order == 'service')
                                                    @lang('admin.services')/ {{ Str::limit($latest_order->service->name, 25) }}
                                                @else
                                                    @lang('admin.packages')/ {{ Str::limit($latest_order->package->name, 25) }}
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div class="td-content">
                                                @if ($latest_order->status == 'done')
                                                    <a href="#!"><span
                                                            class="badge outline-badge-secondary shadow-none edit_order_status"
                                                            data-id="{{ $latest_order->id }}" data-toggle="modal"
                                                            data-target="#loginModal">@lang('admin.done')</span></a>
                                                @elseif($latest_order->status == 'canceled')
                                                    <a href="#!"><span
                                                            class="badge outline-badge-danger shadow-none edit_order_status"
                                                            data-id="{{ $latest_order->id }}" data-toggle="modal"
                                                            data-target="#loginModal">@lang('admin.canceled')</span></a>
                                                @elseif($latest_order->status == 'pending')
                                                    <a href="#!"><span
                                                            class="badge outline-badge-primary shadow-none edit_order_status"
                                                            data-id="{{ $latest_order->id }}" data-toggle="modal"
                                                            data-target="#loginModal">@lang('admin.pending')</span></a>
                                                @elseif($latest_order->status == 'successful')
                                                    <a href="#!"><span
                                                            class="badge outline-badge-success shadow-none edit_order_status"
                                                            data-id="{{ $latest_order->id }}" data-toggle="modal"
                                                            data-target="#loginModal">@lang('admin.successful')</span></a>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="td-content pricing"><span
                                                    class="">{{ $latest_order->total_price }} $</span></div>
                                        </td>
                                        <td>
                                            <div class="td-content">{{ $latest_order->profile->name }}
                                            </div>
                                        </td>
                                        <td>
                                        <div class="td-content">
                                            <a href="{{ route('user.orders.show', $latest_order->id) }}" class="d-block">
                                                <i style="font-size: 26px;" class="fa fa-eye" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
                        {{-- <div class="col-md-6 col-12">
                            <a href="{{ route('user.events/export/data') }}" class="btn btn-secondary mb-3">@lang('permission.event-export')</a>
                        </div> --}}
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
@endif
@endsection

